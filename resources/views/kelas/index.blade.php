@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12 register">
            <h3>{{ $title }}</h3>
            @if (Auth::user()->level == 3)
            <a href="{{ route('kelas.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
            <br/><br/>
            @endif
            @include('Kelas._search')
            <br>
            <div class="row">
                <div class="col-md-12 register">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <table class="table table-hover table-bordered" id="table">
                              <thead>
                                <th>Tingkat/Nama Kelas</th>
                                <th>Wali Kelas</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                              </thead>
                              <tbody>
                                <?php $i = 1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td><?php echo $row->tingkat."-".$row->nama_kelas ?></td>
                                    <td><?php echo $row->nama_guru ?></td>
                                    <td><?php echo $row->aktif == 'Y' ? 'Aktif' : 'Tidak Aktif' ?></td>
                                    <td style="text-align:center;width:15%;">
                                        <a href="{{ route('jadwal.show', $row->id_kelas) }}" class="btn btn-xs btn-success" title="lihat jadwal kelas {{ $row->tingkat."-".$row->nama_kelas }}">
                                            <i class="fa fa-eye"></i></a>
                                        <a href="{{ URL::route('kelas.edit', $row->id_kelas) }}" class="btn btn-xs btn-primary" title="Edit">
                                        <i class="fa fa-edit"></i></a>
                                        <a href="{{ URL::route('kelas.delete', $row->id_kelas) }}" class="btn btn-xs btn-danger" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure ?">
                                        <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                    <?php echo $data->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()


