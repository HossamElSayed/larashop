
<table style="width:100%" class="table table-hover table-striped" >
    <tr >
        <td colspan="3" align="right"><b>Total:</b> {{App\Category::count()}}</td>
    </tr>
    <tr style="border-bottom:1px solid #ccc; ">
        <th style="padding:10px"> Name</th>
        <th style="padding:10px" colspan="2"> Action</th>

    </tr>
    @foreach($categories as $category)
        <tr  style="height:50px">
            <td style="padding:10px">{{$category->cat_name}}</td>
            <td><a class="btn btn-sm  btn-primary" href="{{url('/admin/editcategory')}}/{{$category->id}}">Edit</a></td>
            <td>
                <form method="post" action="{{url('/admin/deletecategory')}}/{{$category->id}}"  >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger btn-sm" id="del" type="submit"><i class="fas fa-trash"></i>Delete </button>
                </form>

            </td>
        </tr>
    @endforeach
</table>
