'use strict'

$(function () {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        if($input.val()<=1){
            return false;
        }
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
    
    $('a.add-to-cart').on('click', function (e) {
        e.preventDefault();
        var that = $(this);
        var url = that.attr('href');

        $.ajax({
            url: url,
            method: 'get',
            success: function (response) {
                if (Number(response)) {
                    $('#mini-cart span').text(response);
                    $('#alert').removeClass().slideDown().addClass('alert alert-success').text('The product was added successfully');
                }else{
                      $('#alert').removeClass().slideDown().addClass('alert alert-danger').text('The action could not be complated');
                }
            }
        }).fail(function(){
             $('#alert').removeClass().slideDown().addClass('alert alert-danger').text('The action could not be complated');
        }).always(function(){
            window.setTimeout(function(){ 
                $('#alert').slideUp()}
            , 3000);
           
        });
    });
    $('#add-to-cart').on('submit', function(e){
        e.preventDefault();
        var that = $(this);
        var url = that.attr('action');
        var data = that.serialize(); 
        
        $.post(url, data, function (response){
              if (Number(response)) {
                    $('#mini-cart span').text(response);
                    $('#alert').removeClass().slideDown().addClass('alert alert-success').text('The products were added successfully');
                }else{
                      $('#alert').removeClass().slideDown().addClass('alert alert-danger').text('The action could not be complated');
                }
       
    }).fail(function(){
        $('#alert').removeClass().slideDown().addClass('alert alert-danger').text('The action could not be complated');
    }).always(function(){
        window.setTimeout(function(){ 
                $('#alert').slideUp();
           } , 3000);
        });
    }); 
    $('.product-quantity').on('change', debounce(function(){

        var that = $(this),
        parent =that.parents('.update-cart'),
         url = parent.attr('action'),
         data = parent.serialize();
         
        
                $.post(url, data, function (response){
              if (Number(response.cart_count)) {
                    $('#mini-cart span').text(response.cart_count);
                    $('#alert').removeClass().slideDown().addClass('alert alert-success').text('The cate was update successfully');
                   that.parents('tr').find('.product-total').text(response.product_total);
                   $('.cart-total').text(response.cart_total);
                }else{
                      $('#alert').removeClass().slideDown().addClass('alert alert-danger').text('The cate was not able to update');
                }
    
    },'json').fail(function(){
        $('#alert').removeClass().slideDown().addClass('alert alert-danger').text('The cate was not able to update');
    }).always(function(){
        window.setTimeout(function(){ 
                $('#alert').slideUp();
            }, 3000);
         });
    },500));
    
    $('a.delete-product').on('click', function(){
        return confirm('Are you sure you wand to delete this amazing product?');
    })
    
        $('a.delete-cart').on('click', function(){
        return confirm('Are you sure you wand to delete your cart?');
    })
});

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};
