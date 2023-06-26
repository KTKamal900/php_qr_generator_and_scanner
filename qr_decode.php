<!DOCTYPE html>
<html>

<head>
    <title>Instascan</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="instascan.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
            text-align: center;
            font-size: 18px;
        }

        .container {
            /* display: flex; */
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        * {
            box-sizing: border-box;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        [class*="col-"] {
            float: left;
            padding: 15px;
        }


        /* For mobile phones: */
        [class*="col-"] {
            width: 100%;
        }

        @media only screen and (min-width: 600px) {

            /* For tablets: */
            .col-s-1 {
                width: 8.33%;
            }

            .col-s-2 {
                width: 16.66%;
            }

            .col-s-3 {
                width: 25%;
            }

            .col-s-4 {
                width: 33.33%;
            }

            .col-s-5 {
                width: 41.66%;
            }

            .col-s-6 {
                width: 50%;
            }

            .col-s-7 {
                width: 58.33%;
            }

            .col-s-8 {
                width: 66.66%;
            }

            .col-s-9 {
                width: 75%;
            }

            .col-s-10 {
                width: 83.33%;
            }

            .col-s-11 {
                width: 91.66%;
            }

            .col-s-12 {
                width: 100%;
            }
        }

        @media only screen and (min-width: 768px) {

            /* For desktop: */
            .col-1 {
                width: 8.33%;
            }

            .col-2 {
                width: 16.66%;
            }

            .col-3 {
                width: 25%;
            }

            .col-4 {
                width: 33.33%;
            }

            .col-5 {
                width: 41.66%;
            }

            .col-6 {
                width: 50%;
            }

            .col-7 {
                width: 58.33%;
            }

            .col-8 {
                width: 66.66%;
            }

            .col-9 {
                width: 75%;
            }

            .col-10 {
                width: 83.33%;
            }

            .col-11 {
                width: 91.66%;
            }

            .col-12 {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <video id="preview" class="col-6"></video>
            <div class="col-6">
                <h1>QR Scan</h1>
                <h2 id="qr_info"></h2>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            // Whether to scan continuously for QR codes. If false, use scanner.scan() to manually scan.
            // If true, the scanner emits the "scan" event when a QR code is scanned. Default true.
            continuous: true,

            // The HTML element to use for the camera's video preview. Must be a <video> element.
            // When the camera is active, this element will have the "active" CSS class, otherwise,
            // it will have the "inactive" class. By default, an invisible element will be created to
            // host the video.
            video: document.getElementById("preview"),

            // Whether to horizontally mirror the video preview. This is helpful when trying to
            // scan a QR code with a user-facing camera. Default true.
            mirror: true,

            // Whether to include the scanned image data as part of the scan result. See the "scan" event
            // for image format details. Default false.
            captureImage: false,

            // Only applies to continuous mode. Whether to actively scan when the tab is not active.
            // When false, this reduces CPU usage when the tab is not active. Default true.
            backgroundScan: true,

            // Only applies to continuous mode. The period, in milliseconds, before the same QR code
            // will be recognized in succession. Default 5000 (5 seconds).
            refractoryPeriod: 5000,

            // Only applies to continuous mode. The period, in rendered frames, between scans. A lower scan period
            // increases CPU usage but makes scan response faster. Default 1 (i.e. analyze every frame).
            scanPeriod: 1,

        });
        scanner.addListener("scan", function(content) {
            console.log(content);
            document.getElementById("qr_info").textContent = content;
        });
        Instascan.Camera.getCameras()
            .then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error("No cameras found.");
                }
            })
            .catch(function(e) {
                console.error(e);
            });
    </script>
</body>

</html>