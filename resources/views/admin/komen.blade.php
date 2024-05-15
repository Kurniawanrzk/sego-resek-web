@extends('layouts.admin')

@section('content')
<!-- Button trigger modal -->


  <!-- Modal -->

<div class="container">
    <div class="row recent-saran">
        <div class="col">


            <h4>Komentar Dari Pengunjung Website</h4>

            <div class="col">
              @foreach ( $with["komen"] as $komen)
              <div class="col shadow-sm border mt-2 p-2">
                <div class="d-flex align-items-center justify-content-between">
                   <div class="col-10">
                      <p>{{$komen->komen}}</p>
                   </div>
                   <div class="col-1">

                      <p style="color:blue">{{ \Carbon\Carbon::parse($komen->waktu_komentar)->diffForHumans() }}</p>
                   </div>
                </div>
                <div class="col d-flex">
                    <form action="{{Route("delete_komen", $komen->token_komentar)}}" id="delete-form-komen" method="post">
                        @csrf
                        @method("delete")
                        <button class="btn delete-btn-komen" type="submit"><span style="color:gray">Remove</span></button>
                    </form>
                    <button type="button" class="btn" style="color:gray" data-bs-toggle="modal" data-bs-target="#exampleModal" data-token-komentar="{{ $komen->token_komentar }}">
                        Balas
                    </button>

                    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                              <button type="button" onclick="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-grid">
                                <form action="{{Route("admin_post_komen")}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token_komentar_pengunjung" value="{{$komen->token_komentar}}">
                                <label>Komentar</label>
                              <textarea name="isi_komen" class="form-control" id="" cols="30" rows="10"></textarea>
                              <label>Pembahasan tentang menu</label>
                              <select class="form-control"  name="id_menu" id="">
                                <option value="0">Pembahasan diluar menu</option>
                                @foreach ($with["menu"] as $item)
                                    <option value="{{$item->id_menu}}">{{$item->nama_menu}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
                </div>
             </div>
             @if (App\Models\AdminBalasKomen::where("token_komentar_pengunjung", $komen->token_komentar)->exists())
             @php
             $balasan = App\Models\Balasan::select('balasan.balasan', 'balasan.waktu_balas', 'balasan.id_balasan',"admin_balas_komen.token_komentar_pengunjung")
            ->join('admin_balas_komen', 'admin_balas_komen.id_balasan_admin', '=', 'balasan.id_balasan')
            ->where('admin_balas_komen.token_komentar_pengunjung', $komen->token_komentar)
            ->get();
             @endphp
                @foreach ( $balasan as $balasan)
                <div class="ms-4 col shadow-sm border mt-2 p-2" style="background-color: rgb(240, 240, 240)">
                    <div class="d-flex align-items-center justify-content-between">
                       <div class="col-10">
                          <p>{{$balasan->balasan}} </p>
                       </div>
                       <div class="col-1">

                          <p style="color:blue">{{ \Carbon\Carbon::parse($balasan->waktu_balas)->diffForHumans() }}</p>
                       </div>
                    </div>

                    <div class="col">
                        <form action="{{Route("delete_balasan", $balasan->id_balasan)}}" id="delete-form-komen" method="post">
                            @csrf
                            @method("delete")
                            <button class="btn delete-btn-komen" type="submit"><span style="color:gray">Remove</span></button>
                        </form>
                        <span style="color:gray">Balasan Admin</span>

                    </div>
                 </div>
                @endforeach
             @endif
             @endforeach
              <script>
                 document.querySelectorAll('.btn[data-bs-target="#exampleModal"]').forEach(button => {
                    button.addEventListener('click', function() {
                        const tokenKomentar = this.getAttribute('data-token-komentar');
                        const modalForm = document.getElementById('exampleModal');
                        const tokenInput = modalForm.querySelector('input[name="token_komentar_pengunjung"]');
                        tokenInput.value = tokenKomentar;
                    });
                });
                // Assign event listeners to each delete button
                const deleteButtonsKomen = document.querySelectorAll(".delete-btn-komen");

                deleteButtonsKomen.forEach(button => {
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
