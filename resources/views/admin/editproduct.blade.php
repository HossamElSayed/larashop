@extends('admin.master')
@section('title', 'edit')

@section('content')
    <script>
        $(document).ready(function(){

            $("#msg").hide();
            //alert("working");

            $("#btn").click(function(){
                $("#msg").show();

                var pro_name = $("#pro_name").val();
                var pro_code = $("#pro_code").val();
                var pro_price = $("#pro_price").val();
                var token = $("#token").val();
                var id = $("#id").val();

                $.ajax({
                    type: "post",
                    data: "id="+id+"&pro_name=" + pro_name + "&pro_code=" + pro_code + "&pro_price=" + pro_price + "&_token=" + token,
                    url: "<?php echo url('/admin/saveproduct') ?>",
                    success:function(data){
                        $("#msg").html("Product has been updated");
                        $("#msg").fadeOut(2000);
                    }
                });
            });
        });
    </script>
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">

                        <div class="content" style="text-align: center">

                            <h3>Image Product</h3>

                            <img src="{{url('uploads/img_product')}}/{{$product[0]->pro_image}}" style="width: 100%">
                            <div class="footer">
                               <a href="{{url('admin/changeimage')}}/{{$product[0]->id}}" class="bt btn-fill btn-sm btn-primary" >Change Image Product</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">

                        <div class="content">
                            <h2>Edit Product</h2>
                            <p id="msg" class="alert alert-success"></p>

                            <input type="hidden" value="{{$product[0]->id}}" id="id"/>
                            <input type="hidden" value="{{csrf_token()}}" id="token"/>


                            <br>
                            <label>Product Name</label>
                            <input type="text" id="pro_name" value="{{ $product[0]->pro_name }}" class="form-control"/>
                            <br>

                            <label>Product Code</label>
                            <input type="text" id="pro_code" value="{{$product[0]->pro_code}}" class="form-control"/>
                            <br>

                            <label>Product Price</label>
                            <input type="text" id="pro_price" value="{{$product[0]->pro_price}}" class="form-control"/>
                            <br>

                            {{--<label>Product Info</label>--}}
                            {{--<textarea id="pro_info" class="form-control"></textarea>--}}
                            {{--<br>--}}
                            <input type="submit" class="btn btn-success btn-fill" value="Submit" id="btn"/>
                            <div class="footer">
                                <p>Donec congue eleifend sapien, in molestie diam vulputate sit amet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection