@extends('admin.master')
@section('title', 'Admin')

@section('content')

    <script>
        $(document).ready(function(){

            $("#msg").hide();
            $("#btn").click(function(){
                $("#msg").show();

                var cat_name = $("#cat_name").val();
                var token = $("#token").val();

                $.ajax({
                    type: "post",
                    data: "cat_name=" + cat_name +  "&_token=" + token,
                    url: "<?php echo url('/admin/savecategory') ?>",
                    success:function(data){
                        $("#msg").html("Category has been inserted");
                        $("#msg").fadeOut(2000);
                    }
                });

            });

            var auto_refresh = setInterval(
                function(){
                    $('#categories').load('<?php echo url('admin/categories');?>').fadeIn("slow");
                },100);



        });
    </script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">

                        <div class="content">
                            <h2>Add Category</h2>
                            <p id="msg" class="alert alert-success"></p>

                            <input type="hidden" value="{{csrf_token()}}" id="token"/>

                            <br>
                            <label>Category Name</label>
                            <input type="text" id="cat_name" class="form-control"/>
                            <br>

                            <input type="submit" class="btn btn-success btn-fill" value="Submit" id="btn"/>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card">
                        <div class="content" style="height:400px; overflow-y:scroll; overflow-x:hidden">

                            <div id="categories">
                                {{--<img src="{{url('public/img/loading.gif')}}" style="width:100%; text-align:center">--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection
