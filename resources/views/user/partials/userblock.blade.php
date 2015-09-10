<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" alt="{{ $user->getNameOrUserName() }}" src="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">
            <a href="#">{{ $user->getNameOrUserName() }}</a>
        </h4>
        @if ($user->location)
            <p>{{ $user->location }} </p>
        @endif
    </div>
</div>