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
        width: 30%;
        margin: 10px auto !important;
    }
   /* HTML: <div class="loader"></div> */
.loader {
  width: 100px;
  aspect-ratio: 1;
  padding: 10px;
  box-sizing: border-box;
  display: grid;
  background: #fff;
  filter: blur(5px) contrast(10);
  mix-blend-mode: darken;
}
.loader:before,
.loader:after{
  content: "";
  grid-area: 1/1;
  background:
    linear-gradient(#000 0 0) left,
    linear-gradient(#000 0 0) right;
  background-size: 20px 40px;
  background-origin: content-box;
  background-repeat: no-repeat;
}
.loader:after {
  height: 20px;
  width:  20px;
  margin: auto 0;
  border-radius: 50%;
  background: #000;
  animation: l10 1s infinite;
}
@keyframes l10{
  90%,100% {transform: translate(300%)}
}


</style>
@endpush




@push('scripts')
<script>

    $( ".search_input" ).keyup(function(e){
        if(typeof tim !== 'undefined') clearTimeout(tim)

        if(e.target.value.length > 2){
            tim = setTimeout(() => {
                $('.collection-wrapper').html('<span class="loader"></span>')

                $.get( `/search/${e.target.value}`, function( data ) {
                    if(data){
                        history.pushState('', "", `/searchitem/${e.target.value}`);
                    $('.collection-wrapper').html(data)
                    }
                })
            }, 600)
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

