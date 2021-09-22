@include('inc.head')

    <!-- Main Page Content -->
    <div class="page-content">
        <div class="col-md-12">
        <!-- Default -->
            <div class="panel panel-light h-auto">
                <div class="panel-body">
                    <div class="example-area justify-content-start" data-title="Cinema Mode">
                        <div class="text-center my-4">
                            <div class="player">
                                <video
                                    controls
                                    autoplay
                                    crossorigin
                                    playsinline
                                    id="player"
                                >
                                    <!-- Video files -->
                                    <source
                                        src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
                                        type="video/mp4"
                                        size="1080"
                                    />
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- / Default -->

        </div><!-- / .col-md-12 -->

        <br/>
        @foreach($slider_channel as $channel)
        <div class="card card-promotion-wide" style="background-image: url('{{ env('IMAGE_URL') }}/{{ $channel->channel_image }}');">
            <div class="card-overlay" style="background-color: #363679;"></div>
            <div class="card-body">
                <h4 class="card-titles text-white">Top Viewing</h4>
                <h5 class="card-title text-white font-weight-600">{{ $channel->channel_name }}</h5>
                <p class="card-text text-light">Live -  {{ count($channel->viewer->where("status", 1)) }} Watching</p>
            </div>
            <a href="#" class="btn btn-light btn-rounded btn-play btn-square">
                <i id="play" onclick="loadDoc()" class="fas fa-play"></i>
                <p style="display: none" id="channel_url">{{ $channel->channel_url }}</p>
            </a>
        </div>
        @endforeach

        <!-- Latest Movies -->
        @foreach($categories as $category)
        <h3 class="list-title">{{ $category->category_name }}</h3>
        <div class="row">
            @if(!empty($category->channel))
                @foreach($category->channel as $channel)
                <div class="col-md-4">
                    <div class="card mt-4 card-video-3">
                        <div class="card-header" style="background-image: url('{{ env('IMAGE_URL') }}/{{ $channel->channel_image }}');">
                            <span class="badge badge-danger">{{ $channel->channel_name }}</span>
                            <span class="badge video-duration-badge">{{ count($channel->viewer->where("status", 1)) }} Watching</span>
                        </div>
                        <a href="#" class="card-body"  onclick="loadDoc()">
                            
                            <span class="card-title">{{ $channel->channel_name }}</span>
                            <span class="card-text">
                                {{ count($channel->viewer->where("status", 1)) }} Watching
                            </span>
                            <p style="display: none" id="channel_url">{{ $channel->channel_url }}</p>
                        </a>
                    </div>

                </div>
                @endforeach
            @endif

        </div><!-- / Latest Movies -->
        @endforeach

    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('inc.foot')
<script>
    const play1 = new Plyr('#player');
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var url = document.getElementById("channel_url").innerText;
                (function () {
                    var video = document.querySelector('#player');
                    if (Hls.isSupported()) {
                        var hls = new Hls();
                        hls.loadSource(url);
                        hls.attachMedia(video);
                        hls.on(Hls.Events.MANIFEST_PARSED,function() {
                        video.play();
                        });
                    }

                    const player = new Plyr(video);
                })();
            }
        };
        xhttp.open("GET", "/", true);
        xhttp.send();
    }
</script>


