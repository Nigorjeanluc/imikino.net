  @extends('home')

  @section('title', 'All Sports')
  
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
            @if (Session::has('success'))

                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Success:</strong> {{ Session::get('success') }}
                    </div>
                </div>

            @endif

            @if (count($errors) > 0)

                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Errors:</strong>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div> 

            @endif
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                            <td>
                                <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $tags->links() !!}
            </div>
        </div><!-- end of .clo-md-8 -->

        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                    <h2>New Tag</h2>
                    <div class="form-group">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                    {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block']) }}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  @endsection