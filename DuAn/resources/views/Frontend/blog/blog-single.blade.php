@extends('Frontend.layouts.app')

@section('content')
<div class="blog-post-area">
    <h2 class="title text-center">Latest From our Blog</h2>
    <div class="single-blog-post">
        <h3>{{$data->title}}</h3>
        <div class="post-meta">
            <ul>
                <li><i class="fa fa-user"></i> Mac Doe</li>
                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
            </ul>
            <span>
                @if(is_int($rate)){
                    @for($i=0;$i<$rate;$i++)
                        <i class="fa fa-star"></i>
                    @endfor
                } 
                @endif
                @if(!is_int($rate))
                    @for($i=0;$i<$rate-1;$i++)
                    <i class="fa fa-star"></i>
                        
                    @endfor
                    <i class="fa fa-star-half-o"></i>
                @endif
            </span>
        </div>
        <a href="">
            <img src="<?php echo asset("admin/blog/{$data->image}") ?>" alt="{{$data->image}}">

        </a>
        <p>
            {{$data->description}}
        </p> <br>

        <p>
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
            totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
            explicabo.</p> <br>

        <p>
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
            dolores eos qui ratione voluptatem sequi nesciunt.</p> <br>

        <p>
            Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
            numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
        </p>
        <div class="pager-area">
            <ul class="pager pull-right">
                <?php    if($state == 'min'){ ?>
                <li><a href="{{$next}}">Next</a></li>
                <?php   } ?>
                <?php    if($state == 'max'){ ?>
                <li><a href="{{$previous}}">Pre</a></li>
                <?php    } ?>
                <?php    if($state != 'min' && $state !='max') { ?>
                <li><a href="{{$previous}}">Pre</a></li>
                <li><a href="{{$next}}">Next</a></li>
                <?php  } ?>
            </ul>
        </div>
    </div>
</div>
<!--/blog-post-area-->

<div class="rating-area">
    <ul class="ratings">
        <li class="rate-this">Rate this item:</li>
        <div class="rate">
            <div class="vote">
                <input type="hidden" class="id" value="{{$data->id}}" />
                <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
                <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
                <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
                <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
                <span class="rate-np">4.5</span>
            </div>
        </div>
        <!-- <li>
            <i class="fa fa-star color"></i>
            <i class="fa fa-star color"></i>
            <i class="fa fa-star color"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </li> -->
        <li class="color">(6 votes)</li>
    </ul>
    <ul class="tag">
        <li>TAG:</li>
        <li><a class="color" href="">Pink <span>/</span></a></li>
        <li><a class="color" href="">T-Shirt <span>/</span></a></li>
        <li><a class="color" href="">Girls</a></li>
    </ul>
</div>
<!--/rating-area-->

<div class="socials-share">
    <a href=""><img src="images/blog/socials.png" alt=""></a>
</div>
<!--/socials-share-->

<div class="media commnets">
    <a class="pull-left" href="#">
        <img class="media-object" src="images/blog/man-one.jpg" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Annie Davis</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat.</p>
        <div class="blog-socials">
            <ul>
                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
            </ul>
            <a class="btn btn-primary" href="">Other Posts</a>
        </div>
    </div>
</div>
<!--Comments-->
<div class="response-area">
    <h2>3 RESPONSES</h2>
    <ul class="media-list">
        @foreach($comment as $value)
        @if($value->level == 0)
        <li class="media">
            <a class="pull-left" href="#">
                <img style="width:30px" class="media-object"
                    src="<?php echo asset("admin/assets/images/users/{$value->user_avatar}") ?>" alt="">
            </a>
            <div class="media-body">
                <ul class="sinlge-post-meta">
                    <li><i class="fa fa-user"></i>Janis Gallagher</li>
                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                </ul>
                <p>{{$value->content}}</p>
                <a class="btn btn-primary reply"><i class="fa fa-reply"></i>Reply</a>

                <form method="post">
                    @csrf
                    <input type="hidden" name='id_blog' value="{{$value->id_blog}}" />
                    <textarea class="rep" style="display:none" name="content" rows="10"></textarea>
                    <input type="hidden" name='level' value="{{$value->id}}" />
                    <input type="hidden" name='reply'>
                    <button class="btn btn-success reply" style="display:none">Reply comment</button>
                </form>

            </div>
        </li>
        @foreach($comment as $data)
        @if($data->level == $value->id)
        <li class="media second-media">
            <a class="pull-left" href="#">
                <img class="media-object" style="width:30px" src="<?php echo asset("admin/assets/images/users/{$data->user_avatar}") ?>" alt="">
            </a>
            <div class="media-body">
                <ul class="sinlge-post-meta">
                    <li><i class="fa fa-user"></i>Janis Gallagher</li>
                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                </ul>
                <p>{{$data->content}}</p>
                <a class="btn btn-primary reply"><i class="fa fa-reply"></i>Reply</a>
                <textarea class="reply" style="display:none" name="" rows="10"></textarea>
            </div>
        </li>
        @endif
        @endforeach 
        @endif
        
        @endforeach
    </ul>
</div>
<!--/Response-area-->
<div class="replay-box">
    <div class="row">
        <div class="col-sm-4">
            <h2>Leave a replay</h2>
        </div>
        <div class="col-sm-8">
            <div class="text-area">
                <div class="blank-arrow">
                    <label>Your Comment</label>
                </div>
                <span>*</span>
                <form method='post'>
                    @csrf
                    <textarea name="content" rows="11"></textarea>
                    <input type="hidden" name="comment">
                    <button class="btn btn-success" id='comment' type='submit' >post comment</button>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('button#comment').submit(function() {
        var loggedIn = "{{Auth::check()}}";
        console.log(loggedIn);
        if (loggedIn == "") {
            alert('Please to login first');
           // window.location.href = "https://www.24h.com.vn/";
            window.location.href = "{{ url('/member/login') }}";
            return false;
            // 
            // window.location.href = "{{route('login')}}";
        } else
            return true;
    })
    $('a.reply').click(function() {
        var show = $(this).closest('div').find('textarea.rep').show();
        var showButton = $(this).closest('div').find('button.reply').show();
        //alert(show);
    })
    //vote
    $('.ratings_stars').hover(
        // Handles the mouseover
        function() {
            $(this).prevAll().andSelf().addClass('ratings_hover');
            // $(this).nextAll().removeClass('ratings_vote'); 
        },
        function() {
            $(this).prevAll().andSelf().removeClass('ratings_hover');
            // set_votes($(this).parent());
        }
    );

    $('.ratings_stars').click(function() {
        var values = $(this).find("input").val();
        var id_blog = $(this).closest("div.vote").find("input.id").val(); 
        alert(id_blog);
        if ($(this).hasClass('ratings_over')) {
            $('.ratings_stars').removeClass('ratings_over');
            $(this).prevAll().andSelf().addClass('ratings_over');
        } else {
            $(this).prevAll().andSelf().addClass('ratings_over');
        }
        $.ajax({ 
            type: 'POST',
            url : '{{route("blog-rate")}}',
            data:{
                values:values,
                id_blog:id_blog
            },
            success:function(data) {
                console.log(data.success);
            }
        });
        
    });
});
</script>
<!--/Repaly Box-->
@endsection