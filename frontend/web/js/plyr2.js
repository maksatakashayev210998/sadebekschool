// const player = Array.from(document.querySelectorAll('.plyr__video-embed')).map(p => new Plyr(p));

const player = Array.from(document.querySelectorAll('.plyr__video-embed')).map(p => new Plyr(p, {
    settings:[
        'captions',
        'quality',
        'speed',
        'loop'
    ],
    controls:[
        'play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'
    ],
    quality: {
        default: 720, options: [1440, 1080, 720, 576, 480]
    }
}));