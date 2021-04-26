@extends('admin.frontend_dashboard.home')
@section('name','Result')
@section('section')
    <div class="card">


        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            #
                        </th>
                        <th>
                            Full Name
                        </th>
                        <th>
                            Total Points
                        </th>
                        <th>
                            Questions
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $key => $result)
                        <tr data-entry-id="{{$key + $results->firstitem()}}">
                            <td>

                            </td>
                            <td>
                                {{ $result->id ?? '' }}
                            </td>
                            <td>
                                {{ $result->user->first_name . ' ' . $result->user->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $result->total_points ?? '' }}
                            </td>
                            <td>
                                @foreach($result->questions as $key => $item)
                                    <span class="badge badge-info">{{ $item->question_text }}</span>
                                @endforeach
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
