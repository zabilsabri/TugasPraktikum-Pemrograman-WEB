@extends('layout.admin');
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Article</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active"><a href="articles">Articles</a></li>
                        <li class="breadcrumb-item active">Create New Articles</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body row">

                <div class="col-12">
                    <div class="form-group">
                        <form action="createArticle" method="POST">
                            @csrf
                                    <label for="inputName">Title</label>
                                    <input type="text" id="title" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Description (At least 20 characters)</label>
                                <input type="text" id="description" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Articles's Body</label>
                                <textarea id="body" class="form-control" name="body" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection