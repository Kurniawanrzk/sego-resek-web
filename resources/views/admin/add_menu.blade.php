@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-10 p-3">
            <form action="@if($with['method'] == "post") {{Route("admin_menu_post")}} @else {{ Route("admin_menu_put", $with['data_menu']->id_menu) }} @endif" method="post" enctype="multipart/form-data">
                @csrf
                @if ($with['method'] != "post")
                @method('put')

                @endif
                <h5>Add New Menu</h5>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Nama menu</span>
                    <input type="text" class="form-control" aria-label="nama_menu" name="nama_menu" value="@if($with['method'] == "post") {{old("nama_menu")}} @else{{$with["data_menu"]->nama_menu}} @endif" autofocus aria-describedby="addon-wrapping">
                </div>
                <br>
                <div class="input-group flex-nowrap" style="width: fit-content">
                    <span class="input-group-text" id="addon-wrapping">Nama menu</span>

                    <input style="width: 100%" onchange="previewImage(this);" type="file" aria-label="foto" class="form-control" name="foto" autofocus aria-describedby="addon-wrapping">
                    <br>
                    <div class="d-block">
                        @if ($with['method'] == "post")
                        <img id="img-preview" width="200px" src="{{old('foto')}}" />
                    @else
                        <img id="img-preview" src="{{url("/")."/uploads/menu_foto/".$with['data_menu']->file_foto}}" width="200px" />
                    @endif
                    </div>
                </div>
                <script>
                    function previewImage(input) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('img-preview').src = e.target.result;
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                </script>
                <br>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Harga menu</span>
                    <input type="text" class="form-control" name="harga_menu"
                    value="@if($with['method'] == "post") {{old('harga_menu')}} @else{{$with["data_menu"]->harga_menu}} @endif"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    aria-label="harga_menu" aria-describedby="addon-wrapping">

                             </div>
                <br>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Deskripsi</span>
                    <textarea type="text" class="form-control" name="deskripsi" aria-label="deskripsi" aria-describedby="addon-wrapping">@if($with['method'] == "post"){{old('deskripsi')}}@else{{$with["data_menu"]->deskripsi}}@endif</textarea>
                </div>
                <br>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Tipe Menu</span>
                    <select type="text" class="form-control" name="tipe_menu" aria-label="tipe_menu" aria-describedby="addon-wrapping">
                        <option>--Pilih Tipe Menu--</option>
                        <option value="makanan" @if($with['method'] != "post" && $with["data_menu"]->tipe_menu == "makanan") selected @endif>makanan</option>
                        <option value="minuman" @if($with['method'] != "post" && $with["data_menu"]->tipe_menu == "minuman") selected @endif>minuman</option>
                        <option value="cemilan" @if($with['method'] != "post" && $with["data_menu"]->tipe_menu == "cemilan") selected @endif>cemilan</option>
                    </select>
                </div>
                <br>
                <button class="btn btn-success">@if ($with['method'] == 'post') Tambahkan @else Perbarui @endif</button>
            </form>
        </div>
    </div>
</div>
@endsection
