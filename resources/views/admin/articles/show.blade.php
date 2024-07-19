@extends('admin.layouts.master')

@section('title')
    Xem chi tiết Danh mục: {{ $model->name }}
@endsection

@section('content')
    <table class="table table-hover" border="1">
        <tr>
            <th>Trường</th>
            <th>Giá trị</th>
        </tr>

        @foreach($model->toArray() as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>
                    @php
                        if ($key == 'image') {
                            $url = \Storage::url($value);

                            echo "<img src=\"$url\" alt=\"\" width=\"50px\">";

                        }else if ($key == 'banner') {
                            $url = \Storage::url($value);

                            echo "<img src=\"$url\" alt=\"\" width=\"50px\">";

                        }
                        elseif (\Illuminate\Support\Str::contains($key, 'is_')) {
                            echo $value
                                    ? '<span class="badge bg-primary">YES</span>'
                                          : '<span class="badge bg-danger">NO</span>';
                        } else {
                            echo $value;
                        }
                    @endphp
                </td>
            </tr>
        @endforeach
    </table>
@endsection
