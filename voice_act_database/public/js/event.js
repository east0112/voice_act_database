$(document).ready( function(){
    // ページロード時処理
    /*
    twttr.widgets.createTweet(
        '1150119348997988357',
        document.getElementById('container'),
        {
          theme: 'white'
        }
      );
      */
});
$(function getTweet(divId,tweetId){
    twttr.widgets.createTweet(
        tweetId,
        document.getElementById('container' + divId ),
        {
        theme: 'white'
        }
    );
});