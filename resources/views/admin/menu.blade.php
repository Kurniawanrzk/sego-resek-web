@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row recent-menu">
        <div class="col">
            <h4 align="center">Semua Menu</h4>
            <a class="mb-3" href="{{ Route("admin_add_menu") }}"><button class="btn btn-primary">Tambah Baru +</button></a>
            <div class="menu-container-item mt-4">
                @foreach ( $with['data_menu'] as $menu)
                <div class="col-lg-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{url("/")."/uploads/menu_foto/".$menu->file_foto}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$menu->nama_menu}}</h5>
                            <h6 class="">Rp.{{$menu->harga_menu}}</h6>
                            <p class="card-text">{{$menu->deskripsi}}</p>
                            <div class="d-flex gap-1">
                                <a href="{{Route('admin_update_menu', $menu->id_menu)}}" class="btn btn-success">Perbarui</a>
                                <form id="delete-form" action="{{ route('delete_menu', $menu->id_menu) }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button  class="btn btn-danger delete-btn" type="button">Hapus</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <script>
                    // Assign event listeners to each delete button
                    const deleteButtons = document.querySelectorAll(".delete-btn");

                    deleteButtons.forEach(button => {
                        button.addEventListener("click", function(event) {
                            event.preventDefault(); // Prevent form submission

                            // Show confirmation dialog
                            Swal.fire({
                                title: 'Apakah Anda yakin ingin menghapus?',
                                text: "Anda tidak akan dapat mengembalikannya!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, hapus!',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // If confirmed, submit the form associated with the clicked button
                                    button.closest('form').submit();
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
