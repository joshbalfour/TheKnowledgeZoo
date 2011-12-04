<?php //adapted from adobe EDGE generated code, inserted a php variable which changes what the animal says. ?>
window.symbols = {
"stage": {
   version: "0.1",
   baseState: "Base State",
   initialState: "Base State",
   parameters: {

   },
   content: {
      dom: [
        {
            id:'background',
            type:'image',
            rect:[0,0,940,200],
            fill:['rgba(0,0,0,0)','../img/background.png'],
        },
        {
            id:'Cow',
            type:'image',
            rect:[0,0,94,114],
            fill:['rgba(0,0,0,0)','../img/cow.png'],
        },
        {
            id:'Giraffee',
            type:'image',
            rect:[0,0,73,133],
            fill:['rgba(0,0,0,0)','../img/giraffe.png'],
        },
        {
            id:'Hippo',
            type:'image',
            rect:[0,0,101,106],
            fill:['rgba(0,0,0,0)','../img/hippo.png'],
        },
        {
            id:'pig',
            type:'image',
            rect:[0,0,104,109],
            fill:['rgba(0,0,0,0)','../img/pig.png'],
        },
        {
            id:'owl',
            type:'image',
            rect:[0,0,111,107],
            fill:['rgba(0,0,0,0)','../img/owl.png'],
        },
        {
            id:'zebra',
            type:'image',
            rect:[0,0,86,104],
            fill:['rgba(0,0,0,0)','../img/zebra.png'],
        },
        {
            id:'goat',
            type:'image',
            rect:[0,0,106,133],
            fill:['rgba(0,0,0,0)','../img/goat.png'],
        },
        {
            id:'talkingowl',
            type:'image',
            rect:[0,0,111,107],
            fill:['rgba(0,0,0,0)','../img/owl%20%2Dtalking.png'],
        },
        {
            id:'SVGImage1',
            type:'image',
            rect:[0,0,150,134],
            fill:['rgba(0,0,0,0)','../img/speechbubble.png'],
        },
        {
            id:'Text1',
            type:'text',
            rect:[406.00000095367,240.00000095367,118,62],
            text:"<?php echo $owlthought; ?>",
            align:"-webkit-auto",
            font:["Times",18,"rgba(0,0,0,1)","normal","none","normal"],
        },
      ],
      symbolInstances: [
      ],
   },
   states: {
      "Base State": {
         "#stage": [
            ["color", "background-color", 'rgba(255,255,255,1)'],
            ["style", "width", '854px'],
            ["style", "height", '<?php if ($_GET['post']=='true') {echo '1000px'; } else {echo '500px';}?>'],
            ["style", "overflow", 'hidden']
         ],
         "#zebra": [
            ["transform", "translateX", '750px'],
            ["transform", "translateY", '81px'],
            ["transform", "rotateZ", '0deg']
         ],
         "#pig": [
            ["transform", "translateX", '352px'],
            ["transform", "translateY", '82px'],
            ["transform", "rotateZ", '0deg']
         ],
         "#Text1": [
            ["style", "opacity", '0'],
            ["transform", "translateY", '-6.94445px'],
            ["transform", "translateX", '2.77777px']
         ],
         "#Cow": [
            ["style", "width", '92px'],
            ["transform", "translateY", '70px'],
            ["transform", "translateX", '17px'],
            ["transform", "rotateZ", '0deg']
         ],
         "#SVGImage1": [
            ["transform", "scaleX", '1.56'],
            ["transform", "translateX", '380px'],
            ["transform", "scaleY", '1.56'],
            ["style", "height", '121px'],
            ["style", "opacity", '0'],
            ["transform", "translateY", '242px'],
            ["style", "width", '147.28813559322px']
         ],
         "#goat": [
            ["style", "width", '98px'],
            ["transform", "translateY", '56px'],
            ["transform", "translateX", '489px'],
            ["transform", "rotateZ", '0deg']
         ],
         "#Giraffee": [
            ["style", "width", '68px'],
            ["transform", "translateY", '59px'],
            ["transform", "translateX", '141px'],
            ["transform", "rotateZ", '0deg']
         ],
         "#owl": [
            ["transform", "translateX", '610px'],
            ["transform", "rotateZ", '0deg'],
            ["style", "opacity", '1'],
            ["transform", "translateY", '84px'],
            ["style", "width", '106px']
         ],
         "#Hippo": [
            ["transform", "translateX", '228px'],
            ["transform", "rotateZ", '0deg'],
            ["style", "height", '107px'],
            ["transform", "translateY", '74px'],
            ["style", "width", '96px']
         ],
         "#talkingowl": [
            ["style", "opacity", '0'],
            ["transform", "translateY", '344px'],
            ["transform", "translateX", '240px']
         ]
      }
   },
   actions: {

   },
   bindings: [

   ],
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 2750,
         timeline: [
            { id: "eid665", tween: [ "style", "#Text1", "opacity", '1', { valueTemplate: undefined, fromValue: '0'}], position: 2250, duration: 500, easing: "linear" },
            { id: "eid651", tween: [ "transform", "#SVGImage1", "scaleX", '1.56', { valueTemplate: undefined, fromValue: '1.56'}], position: 2250, duration: 0, easing: "linear" },
            { id: "eid617", tween: [ "transform", "#owl", "translateX", '242px', { valueTemplate: undefined, fromValue: '610px'}], position: 0, duration: 2000, easing: "linear" },
            { id: "eid663", tween: [ "transform", "#Text1", "translateY", '-6.94445px', { valueTemplate: undefined, fromValue: '-6.94445px'}], position: 2750, duration: 0, easing: "linear" },
            { id: "eid619", tween: [ "transform", "#talkingowl", "translateX", '240px', { valueTemplate: undefined, fromValue: '240px'}], position: 2000, duration: 0, easing: "linear" },
            { id: "eid660", tween: [ "transform", "#talkingowl", "translateX", '242px', { valueTemplate: undefined, fromValue: '240px'}], position: 2250, duration: 500, easing: "linear" },
            { id: "eid655", tween: [ "transform", "#SVGImage1", "translateX", '380px', { valueTemplate: undefined, fromValue: '380px'}], position: 2250, duration: 0, easing: "linear" },
            { id: "eid652", tween: [ "transform", "#SVGImage1", "scaleY", '1.56', { valueTemplate: undefined, fromValue: '1.56'}], position: 2250, duration: 0, easing: "linear" },
            { id: "eid642", tween: [ "style", "#SVGImage1", "height", '121px', { valueTemplate: undefined, fromValue: '121px'}], position: 2250, duration: 0, easing: "linear" },
            { id: "eid622", tween: [ "style", "#talkingowl", "opacity", '1', { valueTemplate: undefined, fromValue: '0'}], position: 2000, duration: 250, easing: "linear" },
            { id: "eid644", tween: [ "style", "#SVGImage1", "width", '147.28813559322px', { valueTemplate: undefined, fromValue: '147.28813559322px'}], position: 2250, duration: 0, easing: "linear" },
            { id: "eid662", tween: [ "transform", "#Text1", "translateX", '2.77777px', { valueTemplate: undefined, fromValue: '2.77777px'}], position: 2750, duration: 0, easing: "linear" },
            { id: "eid618", tween: [ "transform", "#owl", "translateY", '342px', { valueTemplate: undefined, fromValue: '84px'}], position: 0, duration: 2000, easing: "linear" },
            { id: "eid656", tween: [ "transform", "#SVGImage1", "translateY", '242px', { valueTemplate: undefined, fromValue: '242px'}], position: 2250, duration: 0, easing: "linear" },
            { id: "eid658", tween: [ "style", "#SVGImage1", "opacity", '1', { valueTemplate: undefined, fromValue: '0'}], position: 2250, duration: 500, easing: "linear" },
            { id: "eid620", tween: [ "transform", "#talkingowl", "translateY", '344px', { valueTemplate: undefined, fromValue: '344px'}], position: 2000, duration: 0, easing: "linear" },
            { id: "eid659", tween: [ "transform", "#talkingowl", "translateY", '343px', { valueTemplate: undefined, fromValue: '344px'}], position: 2250, duration: 500, easing: "linear" },
            { id: "eid661", tween: [ "style", "#owl", "opacity", '0', { valueTemplate: undefined, fromValue: '1'}], position: 2250, duration: 500, easing: "linear" }]
      }
   },
}};


$(window).ready(function() {
     $.Edge.initialize(symbols);
});

$(window).load(function() {
    $.Edge.play();
});
