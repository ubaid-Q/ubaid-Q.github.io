
let total = document.getElementById('total');
let quantity = document.getElementById('qty');
let item = document.getElementById('item');
let totalItems = document.getElementById('totalItems');
let price = document.getElementById('price');
let discount = document.getElementById('discount');
let totalAmount = document.getElementById('totalAmount');
let netAmount = document.getElementById('netAmount');
let invoiceNo = document.getElementById('invoiceId');
const socket = io('https://shop-socket-123.herokuapp.com/');


$('#item').on('change', async function () {
    var opt = $('option[value="' + $(this).val() + '"]');
    data = await fetch('/product/' + opt.attr('id'));
    data = await data.text();
    data = JSON.parse(data);
    price.value = data.price;
    document.getElementById('stock').innerHTML = data.quantity;
    quantity.focus();
});

window.onbeforeunload = function() {
    return "?";
}


document.addEventListener("keyup", function (event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        addToCart();
    }
});

function calculateTotal(e) {
    const qty = document.getElementById('stock').innerHTML;
    if (parseInt(e.value) > parseInt(qty)) {
        e.value = qty;
    }
    total.value = parseInt(price.value) * parseInt(e.value)
}

function calcDiscount(e) {
    const totalValue = parseInt(price.value) * parseInt(quantity.value);
    let divide = totalValue / 100 * parseInt(e.value)
    const newTotal = parseInt(totalValue) - divide;
    total.value = newTotal;
}
function netDiscount(e) {
    let discValue = parseFloat(totalAmount.innerHTML) / 100 * parseFloat(e.innerHTML);
    const newTotal = parseFloat(totalAmount.innerHTML) - discValue;
    netAmount.innerHTML = newTotal.toFixed(2);
}

const Cart = [];

function addToCart(e) {
    if (total.value === '' || quantity.value === '' || item.value === '') {
        return
    }
    item.focus();
    var opt = $('option[value="' + $(item).val() + '"]');
    let id = opt.attr('id');
    Cart.push({
        id,
        item: item.value,
        quantity: quantity.value,
        discount: discount.value,
        price: price.value,
        total: total.value,
    });

    document.getElementById('cart').insertAdjacentHTML('beforeEnd', `<li id="${id}"
                        class="list-group-item rounded mb-1 d-flex justify-content-between align-items-start bg-light text-dark">
                        <a href="#" onclick='deleteCard(${id})'><i class="fas fa-times-circle fa-lg text-warning"></i></a>
                        <div>
                            <h5 style="word-break: break-word" class="p-0 m-0"><strong>${item.value}</strong></h5>
                            <div class="d-flex">
                                <small><strong> Quantity : ${quantity.value} </strong></small>
                            <div class="p-2"></div>
                                <small><strong> Disc: ${discount.value}% </strong></small>
                            <div class="p-2"></div>
                            <small><strong> Per Rs : ${price.value}</strong></small></div>
                        </div>
                        <span class="badge bg-success rounded-pill">Rs. ${total.value}</span>
                    </li>
                   `);
    total.value = quantity.value = item.value = price.value = discount.value = '';
    totalItems.innerHTML = Cart.length;

    let amount = 0;
    Cart.forEach(item => {
        amount += parseInt(item.total);
    });
    totalAmount.innerHTML = parseFloat(amount).toFixed(2);
    netAmount.innerHTML = parseFloat(amount).toFixed(2);
    console.log(Cart);

}

function deleteCard(id) {
    console.log(id);
    Cart.forEach((item, index) => {
        if (parseInt(item.id) === id) {
            Cart.splice(index, 1);
        }
    });
    document.getElementById(id).remove();
    document.getElementById(id).remove();
    totalItems.innerHTML = Cart.length;
    let amount = 0;
    Cart.forEach(item => {
        amount += parseInt(item.total);
    });
    totalAmount.innerHTML = amount;
    netAmount.innerHTML = amount;
}


function checkout(e) {
    document.getElementById('date').innerHTML = new Date().toLocaleDateString();
    invoiceNo.innerHTML = (new Date()).getTime();
    const invoiceTable = document.getElementById('invoice-table');
    const invoiceItems = document.getElementById('invoice-items');
    const invoiceTotal = document.getElementById('invoice-total');

    let body = '';
    Cart.forEach(item => {
        body = body.concat(`<tr>
                      <td>${item.item}</td>
                      <td>${item.quantity}</td>
                      <td>${item.price}</td>
                      <td>${item.discount}%</td>
                      <td>${item.total}</td>
                  </tr>`);
    });
    console.log(body);
    invoiceTable.innerHTML = body;
    invoiceItems.innerHTML = Cart.length;
    invoiceTotal.innerHTML = netAmount.innerHTML;
}

async function Print() {
    Save();
    var divContents = document.getElementById("printdivcontent").innerHTML;
    var printWindow = window.open(window.location.hostname);
    printWindow.document.write(
        `<html><head><title>Print DIV Content</title>
        <link href="css/material-dashboard.min.css?v=2.2.2" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">`
    );
    printWindow.document.write('</head><body style="padding-left:20px">');
    printWindow.document.write(divContents);
    printWindow.document.write('<a onclick="window.print()">Print</a> </body></html>');
    printWindow.document.close();
}

async function Save() {
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    socket.emit('invoice',{amount:netAmount.innerHTML, invoice_no: invoiceNo.innerHTML});
    const res = await fetch('/stock/:id', {
        headers: {
            "Content-Type": 'application/json; charset=utf-8',
            "X-CSRF-TOKEN": token
        },
        method: 'put',
        body: JSON.stringify([Cart, { amount: netAmount.innerHTML, invoice_no: invoiceNo.innerHTML }])
    });


}
