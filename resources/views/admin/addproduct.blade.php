@extends('admin.master')
@section('title', 'Admin')

@section('content')

    <script>
        $(document).ready(function(){

            $("#msg").hide();
            //alert("working");

            $("#btn").click(function(){
                $("#msg").show();

                var pro_name = $("#pro_name").val();
                var cat_id = $("#cat_id").val();
                var pro_code = $("#pro_code").val();
                var pro_price = $("#pro_price").val();
                var token = $("#token").val();

                $.ajax({
                    type: "post",
                    data: "pro_name=" + pro_name + "&pro_code=" + pro_code +
                        "&pro_price=" + pro_price + "&_token=" + token+ "&cat_id=" + cat_id,
                    url: "<?php echo url('/admin/saveproduct') ?>",
                    success:function(data){
                        $("#msg").html("Product has been inserted");
                        $("#msg").fadeOut(2000);
                    }
                });
            });

            var auto_refresh = setInterval(
                function(){
                    $('#products').load('<?php echo url('admin/products');?>').fadeIn("slow");
                },100);



        });
    </script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">

                        <div class="content">
                            <h2>Add Product</h2>
                            <p id="msg" class="alert alert-success"></p>

                            <select class="form-control" id="cat_id">
                                <option value="">select category</option>
                                @foreach(App\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" value="{{csrf_token()}}" id="token"/>

                            <br>
                            <label>Product Name</label>
                            <input type="text" id="pro_name" class="form-control"/>
                            <br>

                            <label>Product Code</label>
                            <input type="text" id="pro_code" class="form-control"/>
                            <br>

                            <label>Product Price</label>
                            <input type="text" id="pro_price" class="form-control"/>
                            <br>

                            {{--<label>Product Info</label>--}}
                            {{--<textarea id="pro_info" class="form-control"></textarea>--}}
                            {{--<br>--}}
                            <input type="submit" class="btn btn-success btn-fill" value="Submit" id="btn"/>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card">
                        <div class="content" style="height:400px; overflow-y:scroll; overflow-x:hidden">

                            <div id="products">
                                {{--<img src="{{url('public/img/loading.gif')}}" style="width:100%; text-align:center">--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection
