@extends('layouts.master')
@section('content')

<div class="container mb-4`">
   <div class="menu">
    <div class="title-menu">
        <h3 align="center">--------M E N U--------</h3>
    </div>

   <div>
    <div class="">
           <div class="col-2">
            <form action="" id="form-tipe">
                <select onchange="submit(this)" name="tipe" method="get"  class="form-control" id="">
                        <option value="">Pilih Tipe</option>
                        <option value="makanan">makanan</option>
                        <option value="minuman">minuman</option>
                        <option value="cemilan  ">cemilan</option>

                </select>
            </form>
           </div>
           <script>
            const formTipe = document.getElementById("form-tipe")
            function submit(select) {
                formTipe.submit()
            }

           </script>
            <div class="row mt-3 d-flex">
                @foreach ( $with["menu"] as $makanan)
                <div class="col-lg-4 mb-4">
                    <div class="card p-2" style="width: 18rem;">
                        <img src="{{url("/")."/uploads/menu_foto/".$makanan->file_foto}}" style="border:20px solid #f0e8d4ac;border-radius:10px;" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="background:#f0e8d4ac;width:fit-content;padding:10px;border-radius:10px;color:#ac9b6d">{{$makanan->nama_menu}}<br/>Rp.{{$makanan->harga_menu}}</h5>
                            <p style="background:#f0e8d4ac;width:fit-content;padding:10px;border-radius:10px;color:#ac9b6d" class="card-text">{{$makanan->deskripsi}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>

    </div>
   </div>



    </div>
</div>
@endsection

