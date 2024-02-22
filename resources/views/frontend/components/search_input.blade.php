{{-- <input type="text" class="search_input" /> --}}




@push('styles')
<style>

    .search {
      cursor: pointer;
    }

    .search_input {
        /*-------------------- display: none ---------------------*/
      width: 0;
      padding: 0;
      /* position: absolute; */
      left: 45%;
      bottom: -30px;
      border: none;
      z-index: 1;
      /* border-radius: 8px;
      border: 1px solid rgb(196, 196, 196); */
      /* box-shadow: 1px 1px 1px ; */
    }

    .search_input:focus, .search_input:active {
      border: none;
      outline: none;
    }

    .shown {
      width: 100%;
      color: grey;
      margin: 10px auto;
      transition: .1s
    }

    .active_search {
        width: 50%;
        margin: 10px auto !important;
    }

</style>
@endpush




@push('scripts')
<script>

    $( ".search_input" ).keyup(function(e){
        if(e.target.value.length > 2){
            $.get( `/search/${e.target.value}`, function( data ) {
                if(data)
                    var data = JSON.parse(data)
                    console.log(data);
            })
        }
})


    $('.search').click(function(e){
    $(this).addClass('active_search')
      $('.search_input').addClass('shown').focus()

      $(document).click(e=>closeSearch(e))

      return false;
    })


    function closeSearch(e){

		var div = $( ".search_input" );
		if ( !div.is(e.target)
		    && div.has(e.target).length === 0 ) {
			div.removeClass('shown').val('');
            $('.search').removeClass('active_search')
            $(document).off('click')
		}

    }

</script>
@endpush

