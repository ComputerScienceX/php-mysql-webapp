<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livestreaming App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .video-feed {
            width: 100%;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
            background-color: black;
        }
        #viewer-video-container {
            margin-top: 2rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 1rem;
        }
        #remote-video {
            display: none;
            position: relative;
            top: 0;
            left: 0;
            max-width: 100%;
            height: auto;
            border: 2px solid #007bff;
            border-radius: 0.5rem;
            z-index: 10;
            background-color: #000;
            margin-bottom: 1rem;
        }
        #viewer-videos {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }
        .viewer-video-wrapper {
            position: relative;
            width: calc(50% - 1rem);
            max-width: 320px;
            height: auto;
        }
        .viewer-video {
            width: 100%;
            height: auto;
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            background-color: #000;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="index.php" class="text-xl font-semibold text-gray-800">Livestream App</a>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="index.php" class="text-gray-700 hover:text-blue-600 transition duration-300">Home</a></li>
                    <li><a href="viewer.php" class="text-gray-700 hover:text-blue-600 transition duration-300">Viewer</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-6 px-4">
        <?php
            $page = basename($_SERVER['PHP_SELF']);

            if ($page === 'index.php') {
                echo '<div class="text-center">
                        <h1 class="text-3xl font-semibold text-gray-800 mb-4">Welcome to the Livestreaming App</h1>
                        <p class="text-lg text-gray-600 mb-6">View live streams from creators!</p>
                        <p class="text-md text-gray-700">Navigate to the Viewer page to watch streams.</p>
                     </div>';
            } elseif ($page === 'viewer.php') {
                echo '<div class="stream-container">
                        <h1 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Viewer Page</h1>
                        <div id="viewer-video-container" class="viewer-view">
                            <h2 class="text-lg font-semibold text-gray-700 mb-2 text-center">Live Streams</h2>
                            <div id="viewer-videos">
                                 <video id="remote-video" class="video-feed" autoplay playsinline></video>
                            </div>
                        </div>
                     </div>
                     <script>
                        const remoteVideo = document.getElementById('remote-video');
                        const viewerVideosContainer = document.getElementById('viewer-videos');
                        let remoteStreams = new Map();

                        const servers = {
                            iceServers: [
                                {
                                    urls: [
                                        'stun:stun.l.google.com:19302',
                                        'stun:stun1.l.google.com:19302'
                                    ]
                                }
                            ]
                        };

                        const peerConnection = new RTCPeerConnection(servers);

                         peerConnection.onicecandidate = event => {
                            if (event.candidate) {
                                console.log('Viewer: Sending ICE candidate:', event.candidate);
                                setTimeout(() => {
                                    addCandidateToPeer(event.candidate, peerConnection);
                                }, 1000);
                            }
                        };

                        peerConnection.ontrack = event => {
                            const stream = event.streams[0];
                            if (!remoteStreams.has(stream.id)) {
                                remoteStreams.set(stream.id, stream);
                                const viewerVideoWrapper = document.createElement('div');
                                viewerVideoWrapper.className = 'viewer-video-wrapper';
                                const remoteVideoElement = document.createElement('video');
                                remoteVideoElement.className = 'viewer-video';
                                remoteVideoElement.autoplay = true;
                                remoteVideoElement.playsinline = true;
                                remoteVideoElement.srcObject = stream;
                                viewerVideoWrapper.appendChild(remoteVideoElement);
                                viewerVideosContainer.appendChild(viewerVideoWrapper);
                                 remoteVideo.style.display = 'block';
                            }
                        };

                        async function addCandidateToPeer(candidate, pc) {
                             try {
                                  if (pc.connectionState !== 'closed') {
                                        await pc.addIceCandidate(candidate);
                                        console.log('Viewer: ICE candidate added:', candidate);
                                  } else {
                                         console.warn("addCandidateToPeer: Peer connection is closed, not adding candidate", candidate);
                                  }

                            } catch (error) {
                                console.error('Error adding ICE candidate:', error);
                            }
                        }

                        async function connectToStream() {
                            try {
                                const offer = await getOffer();
                                console.log('Viewer: Received offer:', offer);
                                await peerConnection.setRemoteDescription(offer);
                                await peerConnection.setLocalDescription(await peerConnection.createAnswer());
                                const answer = peerConnection.localDescription;
                                console.log('Viewer: Sending answer:', answer);
                                await sendAnswer(answer);
                            } catch (error) {
                                console.error('Error connecting to stream:', error);
                            }
                        }

                        async function getOffer() {
                            // Simulate fetching offer from server (in real-world, use AJAX)
                            return new Promise(resolve => {
                                // Replace this with actual server-side logic to get the offer
                                setTimeout(() => {
                                    // Dummy offer for demonstration
                                    const dummyOffer = {
                                        type: 'offer',
                                        sdp: 'v=0\r\no=- 12345 67890 IN IP4 127.0.0.1\r\ns=-\r\nc=IN IP4 127.0.0.1\r\nt=0 0\r\nm=audio 9 RTP/SAVPF 0\r\na=rtpmap:0 PCMU/8000\r\nm=video 9 RTP/SAVPF 31\r\na=rtpmap:31 H261/90000\r\n'
                                    };
                                    resolve(dummyOffer);
                                }, 1500);
                            });
                        }

                        async function sendAnswer(answer) {
                            // Simulate sending answer to server (in real-world, use AJAX)
                            return new Promise(resolve => {
                                // Replace this with actual server-side logic to send the answer
                                setTimeout(() => {
                                    // Simulate server response
                                    resolve();
                                }, 500);
                            });
                        }

                        connectToStream();
                    </script>
                    ';
            } else {
                // 404 page content
                echo '<div class="text-center">
                        <h1 class="text-4xl font-semibold text-red-600 mb-4">404 - Page Not Found</h1>
                        <p class="text-lg text-gray-700">Sorry, the page you are looking for does not exist.</p>
                     </div>';
            }
        ?>
    </main>

    <footer class="bg-gray-100 py-4 mt-8">
        <div class="container mx-auto text-center text-gray-600 px-4">
            &copy; <?php echo date('Y'); ?> Livestream App. All rights reserved.
        </div>
    </footer>
</body>
</html>
