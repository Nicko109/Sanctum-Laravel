@extends('layouts.main')

@section('content')
<Index></Index>
@endsection
<script>
    import Index from "../js/components";
    export default {
        components: {Index}
    }
</script>
