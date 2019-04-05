@foreach($products as $product)
  <div class="col-xs-6 col-sm-4">
    <div class="itemBox">
      <div class="prod"><img src="{{url('uploads/img_product')}}/{{$product->pro_image}}"
                             alt=""/></div>
      <label>{{$product->pro_name}}</label>
      <span class="hidden-xs">Code:{{$product->pro_code}}</span>
      <div class="addcart">
        <div class="price">{{$product->pro_price}} $</div>
        <div class="cartIco hidden-xs"><a href="/"><img
                    src="{{asset('/theme/images/cart.png')}}"/></a></div>
      </div>
    </div>
  </div>
@endforeach
