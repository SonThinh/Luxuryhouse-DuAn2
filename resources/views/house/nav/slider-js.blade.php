<script type="text/javascript">
    window.jssor_1_slider_init = function () {
        var jssor_1_SlideshowTransitions = [
            {
                $Duration: 1200,
                $Zoom: 1,
                $Easing: {$Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad},
                $Opacity: 2
            },
            {
                $Duration: 1000,
                $Zoom: 11,
                $SlideOut: true,
                $Easing: {$Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear},
                $Opacity: 2
            },
            {
                $Duration: 1200,
                $Zoom: 1,
                $Rotate: 1,
                $During: {$Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8]},
                $Easing: {$Zoom: $Jease$.$Swing, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$Swing},
                $Opacity: 2,
                $Round: {$Rotate: 0.5}
            },
            {
                $Duration: 1000,
                $Zoom: 11,
                $Rotate: 1,
                $SlideOut: true,
                $Easing: {$Zoom: $Jease$.$InQuint, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuint},
                $Opacity: 2,
                $Round: {$Rotate: 0.8}
            },
            {
                $Duration: 1200,
                x: 0.5,
                $Cols: 2,
                $Zoom: 1,
                $Assembly: 2049,
                $ChessMode: {$Column: 15},
                $Easing: {$Left: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                $Opacity: 2
            },
            {
                $Duration: 1200,
                x: 4,
                $Cols: 2,
                $Zoom: 11,
                $SlideOut: true,
                $Assembly: 2049,
                $ChessMode: {$Column: 15},
                $Easing: {$Left: $Jease$.$InExpo, $Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear},
                $Opacity: 2
            },
            {
                $Duration: 1200,
                x: 0.6,
                $Zoom: 1,
                $Rotate: 1,
                $During: {$Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8]},
                $Opacity: 2,
                $Round: {$Rotate: 0.5}
            },
            {
                $Duration: 1000,
                x: -4,
                $Zoom: 11,
                $Rotate: 1,
                $SlideOut: true,
                $Easing: {
                    $Left: $Jease$.$InQuint,
                    $Zoom: $Jease$.$InQuart,
                    $Opacity: $Jease$.$Linear,
                    $Rotate: $Jease$.$InQuint
                },
                $Opacity: 2,
                $Round: {$Rotate: 0.8}
            },
            {
                $Duration: 1200,
                x: -0.6,
                $Zoom: 1,
                $Rotate: 1,
                $During: {$Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8]},
                $Opacity: 2,
                $Round: {$Rotate: 0.5}
            },
            {
                $Duration: 1000,
                x: 4,
                $Zoom: 11,
                $Rotate: 1,
                $SlideOut: true,
                $Easing: {
                    $Left: $Jease$.$InQuint,
                    $Zoom: $Jease$.$InQuart,
                    $Opacity: $Jease$.$Linear,
                    $Rotate: $Jease$.$InQuint
                },
                $Opacity: 2,
                $Round: {$Rotate: 0.8}
            },
            {
                $Duration: 1200,
                x: 0.5,
                y: 0.3,
                $Cols: 2,
                $Zoom: 1,
                $Rotate: 1,
                $Assembly: 2049,
                $ChessMode: {$Column: 15},
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Top: $Jease$.$InCubic,
                    $Zoom: $Jease$.$InCubic,
                    $Opacity: $Jease$.$OutQuad,
                    $Rotate: $Jease$.$InCubic
                },
                $Opacity: 2,
                $Round: {$Rotate: 0.7}
            },
            {
                $Duration: 1000,
                x: 0.5,
                y: 0.3,
                $Cols: 2,
                $Zoom: 1,
                $Rotate: 1,
                $SlideOut: true,
                $Assembly: 2049,
                $ChessMode: {$Column: 15},
                $Easing: {
                    $Left: $Jease$.$InExpo,
                    $Top: $Jease$.$InExpo,
                    $Zoom: $Jease$.$InExpo,
                    $Opacity: $Jease$.$Linear,
                    $Rotate: $Jease$.$InExpo
                },
                $Opacity: 2,
                $Round: {$Rotate: 0.7}
            },
            {
                $Duration: 1200,
                x: -4,
                y: 2,
                $Rows: 2,
                $Zoom: 11,
                $Rotate: 1,
                $Assembly: 2049,
                $ChessMode: {$Row: 28},
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Top: $Jease$.$InCubic,
                    $Zoom: $Jease$.$InCubic,
                    $Opacity: $Jease$.$OutQuad,
                    $Rotate: $Jease$.$InCubic
                },
                $Opacity: 2,
                $Round: {$Rotate: 0.7}
            },
            {
                $Duration: 1200,
                x: 1,
                y: 2,
                $Cols: 2,
                $Zoom: 11,
                $Rotate: 1,
                $Assembly: 2049,
                $ChessMode: {$Column: 19},
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Top: $Jease$.$InCubic,
                    $Zoom: $Jease$.$InCubic,
                    $Opacity: $Jease$.$OutQuad,
                    $Rotate: $Jease$.$InCubic
                },
                $Opacity: 2,
                $Round: {$Rotate: 0.8}
            }
        ];

        var jssor_1_options = {
            $AutoPlay: 1,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Rows: 2,
                $SpacingX: 14,
                $SpacingY: 12,
                $Orientation: 2,
                $Align: 156
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
        var MAX_WIDTH = 1140;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            } else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    };

</script>
<div id="jssor_1" class="jssor_1"
     style="">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin">
        <img src="{{asset('../resources/assets/images/button/spin.svg')}}"/>
    </div>
    <div data-u="slides" class="slider-box">
        @foreach($images as $image)
            <div>
                <img data-u="image" src="{{asset($image->image_path)}}"/>
                <img data-u="thumb"
                     src="{{asset($image->image_path)}}"/>
            </div>
        @endforeach
    </div>
    <!-- Thumbnail Navigator -->
    <div data-u="thumbnavigator" class="jssort101"
         data-autocenter="2" data-scale-left="0.75">
        <div data-u="slides" class="slide-thumbnail">
            <div data-u="prototype" class="p">
                <div data-u="thumbnailtemplate" class="t"></div>
                <svg viewbox="0 0 16000 16000" class="cv">
                    <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                    <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                    <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                </svg>
            </div>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora093 arrowleft"
         data-autocenter="2">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
            <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora093 arrowright"
         data-autocenter="2">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;right:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
            <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
        </svg>
    </div>
</div>
