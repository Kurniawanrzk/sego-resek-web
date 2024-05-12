@extends('layouts.master')
@section('content')
<div
style="position:absolute;width:100%;height:100vh;background-color:rgba(0, 0, 0, 0.174);display:none"
class="insert-komentar">

</div>
<div class="container-komen mt-3 p-5"  id="komen">
    <h4 align="center">Komentar-Komentar pengunjung website</h4>
    <a href="/#kirimkomentar">    <button class="btn btn-light ms-1">Tambah Komentar</button>
    </a>
    <div>
        @foreach ($with["komentar"] as $item )
            <div class="bg-light p-3 rounded shadow mt-2" style="min-width:100%;height:fit-content">
                <p>{{$item->komen}}</p>
                <p style="color:rgb(103, 103, 194)">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
            </div>
            @if (App\Models\AdminBalasKomen::where("token_komentar_pengunjung", $item->token_komentar)->exists())
            @php
            $balasan = App\Models\Balasan::select('balasan.balasan', 'balasan.created_at', 'balasan.id_balasan',"admin_balas_komen.token_komentar_pengunjung")
           ->join('admin_balas_komen', 'admin_balas_komen.id_balasan_admin', '=', 'balasan.id_balasan')
           ->where('admin_balas_komen.token_komentar_pengunjung', $item->token_komentar)
           ->get();
            @endphp
               @foreach ( $balasan as $balasan)
               <div style="background-color: rgb(248, 238, 211)" class="ms-5 p-3 rounded shadow mt-2" style="height:fit-content">
                <p>{{$balasan->balasan}}<br><i style="color:grey">By Admin.</i><br><span style="color:rgb(103, 103, 194)">{{ \Carbon\Carbon::parse($balasan->created_at)->diffForHumans() }}</span></p>
            </div>
               @endforeach
            @endif
        @endforeach
    </div>
</div>
<script>

</script>
@endsection

