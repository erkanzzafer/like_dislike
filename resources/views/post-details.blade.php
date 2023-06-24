@extends('welcome')
@section('content')
    <h1>Post Detail</h1>
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->des }}</p>
    <small class="float-right">
        <span title="Likes" id="saveLikeDislike" data-type="like" data-post="{{ $post->id }}"
            class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold">
            Like
            <span class="like-count">{{ $post->likes() }}</span>
        </span>
        <span title="Dislikes" id="saveLikeDislike" data-type="dislike" data-post="{{ $post->id }}"
            class="mr-2 btn btn-sm btn-outline-danger d-inline font-weight-bold">
            Dislike
            <span class="dislike-count">{{ $post->dislikes() }}</span>
        </span>
    </small>
@endsection
@push('scripts')
    <script>
        $(document).on('click', '#saveLikeDislike', function() {
            var _post = $(this).data('post');
            var _type = $(this).data('type');
            var vm = $(this);

            $.ajax({
                url: "{{ url('save-likedislike') }}",
                type: "post",
                dataType: 'json',
                data: {
                    post: _post,
                    type: _type,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    vm.addClass('disabled');
                },
                success: function(res) {
                    if (res.bool == true) {
                        vm.removeClass('disabled').addClass('active');
                        vm.removeAttr('id');
                        var _prevCount = $("." + _type + "-count").text();
                        _prevCount++;
                        $("." + _type + "-count").text(_prevCount);
                    }
                }
            });
        });
    </script>
@endpush
