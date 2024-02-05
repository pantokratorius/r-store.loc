<input type="text" class="search_input" />




@push('styles')
<style>

    .search {
      cursor: pointer;
    }

    .search_input {
      display: none;  /*-------------------- display: none ---------------------*/
      position: absolute;
      left: 45%;
      bottom: -30px;
      z-index: 1;
      border-radius: 8px;
      border: 1px solid rgb(196, 196, 196);
      /* box-shadow: 1px 1px 1px ; */
    }

</style>
@endpush




@push('scripts')
<script>
    $('.search').click(function(){
      return false;
    })
</script>
@endpush

