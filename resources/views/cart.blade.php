<!DOCTYPE html>
<html>
<head>
    <title>Add to Cart Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<h2>Products</h2>
<ul>
    @foreach ($products as $item)
        <li>{{$item->name}} -Price{{$item->price}}</li>
        <button class="add-to-cart" data-id={{$item->id}}>Add To Card</button>
    @endforeach
</ul>

<h2>Cart</h2>
<ul id="cart-item">
    @foreach ($cart as $cartitem)
    <li>{{$cartitem['name']}} -{{$cartitem['price']}} * {{$cartitem['quantity']}}</li>
        
    @endforeach
</ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $.ajaxSetup({
        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
    })
    $('.add-to-cart').click(function(){
        var productId = $(this).data('id');

        $.ajax({
            url:"{{'addtocart'}}",
            method:"POST",
            data:{id:productId},
            success : function(response){
                if(response.success){
                    let carthtml ='';
                    $.each(response.cart,function(index,item){
                        carthtml +=`<li>${item.name}- ${item.price}*${item.quantity}</li>`;

                    });
                    $('#cart-item').html(carthtml);
                }
            },
            error:function(xhr){
                alert("somthing went wrong!");
            }
        });
    });
</script>
</body>
</html>
