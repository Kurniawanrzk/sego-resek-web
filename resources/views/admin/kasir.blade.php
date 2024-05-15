@extends('layouts.admin')

@section('content')
@php
    function token($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
$token = md5(token() . date("Ymd").time());
@endphp
<div class="container">
    <i style="color: grey" >Untuk Tampilan Yang Lebih Maksimal, gunakan device tablet/laptop</i>
  <div style="display: flex;justify-content:space-between ;gap: 10px;">
    <div class="rounded shadow borded" style="display: grid; grid-template-columns:auto auto auto ; gap:20px; height:100vh; overflow-y: auto;">
        @foreach ($with["data_menu"] as $item_menu)
            <div class="card shadow rounded">
                <div class="card-body">
                    <figure>
                        <center>
                            <img class="rounded border shadow" width="150" src="{{url("/")."/uploads/menu_foto/".$item_menu->file_foto }}" alt="{{$item_menu->file_foto}}">
                        </center>
                        <figcaption class="mt-4">
                            Nama: {{ $item_menu->nama_menu }}
                            <br>
                            Harga: Rp. {{ $item_menu->harga_menu }}
                        </figcaption>
                    </figure>
                    <div style="display: flex">
                        <button onclick="kurangQty(this)" harga_menu="{{$item_menu->harga_menu}}" class="btn btn-danger" nama_menu="{{$item_menu->nama_menu}}">-</button>
                        <button class="btn btn-light border" disabled id="output-{{$item_menu->nama_menu}}">0</button>
                        <input id="ipt-{{$item_menu->nama_menu}}" value="0" type="hidden" class="form-control">
                        <button onclick="tambahQty(this)" harga_menu="{{$item_menu->harga_menu}}" class="btn btn-primary" nama_menu="{{$item_menu->nama_menu}}">+</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        <div id="struk" class="shadow border rounded p-3" style="width:300px;">
            <div class="header">
                <p>
                    Kasir: {{auth()->guard("admin")->user()->username}}
                    <br>
                    {{ date("M d Y") }}
                    <hr>
                </p>
            </div>
            <div class="content" style="overflow-y: auto; max-height: calc(100vh - 150px);"> <!-- Adjust max-height as needed -->
                <!-- Content goes here -->
            </div>
            <div class="footer">
                <p>Total Semua : Rp. <span id="total-semua">0</span></p>
                <div id='qrcode'></div>
            </div>
        </div>
        <div class="m-2">
            <form id="form-struk" action="{{Route("buat_token_komentar")}}" method="post">
                @csrf
                <input type="hidden" name="token_komentar" value="{{$token}}">
                <button id="submit-form" type="submit" disabled="true"  class="btn btn-primary">Submit</button>
                <button id="print-struk" type="button" disabled="true" onclick="printDiv()" class="btn btn-success">Print</button>

            </form>
        </div>
    </div>
  </div>
</div>
<script src="{{ asset('assets/js/qr-scanner/qrcode.js') }}"></script>
<script>
    new QRCode(document.getElementById('qrcode'), "{{$token}}");
    const submitForm = document.getElementById("submit-form");
    const printStruk = document.getElementById("print-struk");
    function printDiv() {
    var content = document.getElementById("struk").innerHTML;
    var printWindow = window.open('', '', 'height=400,width=600');
    printWindow.document.write('<html><head><title>Print Struk</title></head><body>');
    printWindow.document.write(content);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
const struk = document.getElementById("struk");
const formstruk = document.getElementById("form-struk");

function tambahQty(btn) {
    submitForm.disabled = false;
    printStruk.disabled = false;
    const nama_menu = btn.getAttribute("nama_menu");
    const harga_menu = parseInt(btn.getAttribute("harga_menu"));
    const ipt = document.getElementById(`ipt-${nama_menu}`);
    const output = document.getElementById(`output-${nama_menu}`);

    ipt.value = parseInt(ipt.value) + 1; // Increment the quantity
    const total = parseInt(ipt.value) * harga_menu; // Calculate the new total price
    output.innerHTML = ipt.value;

    const paragraph = document.querySelector(`p[menu="menu-${nama_menu}"]`);
    if (paragraph) {
        paragraph.innerText = `${nama_menu} x ${ipt.value} - Total: Rp. ${total}`; // Update the text content with the new quantity and total price
    } else {
        struk.querySelector('.content').innerHTML += `<p style='border-bottom:1px solid #C7C8C9' menu="menu-${nama_menu}">${nama_menu} x ${ipt.value} - Total: Rp. ${total}</p>`; // Add new paragraph with quantity and total price
    }
    document.getElementById("total-semua").innerText = parseInt(document.getElementById("total-semua").innerText) + parseInt(harga_menu)
}

function kurangQty(btn) {
    const nama_menu = btn.getAttribute("nama_menu");
    const harga_menu = parseInt(btn.getAttribute("harga_menu"));
    const ipt = document.getElementById(`ipt-${nama_menu}`);
    const output = document.getElementById(`output-${nama_menu}`);

    const total = (harga_menu * ipt.value) - harga_menu; // Calculate the new total price
    ipt.value = parseInt(ipt.value) - 1; // Decrement the quantity
    if(ipt.value < 0) {
        ipt.value = 0;
        document.getElementById("total-semua").innerText = 0

    }
    output.innerHTML = ipt.value;

    const paragraph = document.querySelector(`p[menu="menu-${nama_menu}"]`);
    if (paragraph) {
        if (ipt.value == 0) {
            paragraph.remove(); // Remove the paragraph element if quantity becomes zero
        } else {
            paragraph.innerText = `${nama_menu} x ${ipt.value} - Total: Rp. ${total}`; // Update the text content with the new quantity and total price
        }
    }
    if(ipt.value != 0) {
        document.getElementById("total-semua").innerText = parseInt(document.getElementById("total-semua").innerText) - parseInt(harga_menu)
    if(document.getElementById("total-semua").innerText ) {
        submitForm.disabled = true;
    printStruk.disabled = true;
    }
    }

}
</script>
@endsection
