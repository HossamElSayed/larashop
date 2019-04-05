
<table style="width:100%" class="table table-hover table-striped" >
    <tr >
        <td colspan="6" align="right"><b>Total:</b> {{App\Product::count()}}</td>
    </tr>
    <tr style="border-bottom:1px solid #ccc; ">
        <th style="padding:10px"> Name</th>
        <th style="padding:10px"> Code</th>
        <th style="padding:10px">Catgeory</th>
        <th style="padding:10px">Price</th>
        <th colspan="2">Update</th>
    </tr>
    @foreach($products as $product)
        <tr  style="height:50px">
            <td style="padding:10px">{{$product->pro_name}}</td>
            <td style="padding:10px">{{$product->pro_code}}</td>
            <td style="padding:10px">{{$product->category->cat_name}}</td>
            <td style="padding:10px">{{$product->pro_price}}</td>
            <td><a class="btn btn-sm  btn-primary" href="{{url('/admin/editproduct')}}/{{$product->id}}">Edit</a></td>
            <td>
                <form method="post" action="{{url('/admin/deleteproduct')}}/{{$product->id}}"  >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger btn-sm" id="del" type="submit"><i class="fas fa-trash"></i>Delete Post</button>
                </form>

            </td>
        </tr>
    @endforeach
</table>
