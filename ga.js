(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

//ga('create', 'UA-61838607-2', 'auto');
ga('create', 'UA-77345549-1', 'auto');
ga('require', 'displayfeatures');
ga('require', 'linkid');
ga('send', 'pageview');


function trackEvent(category, action, label) {
	if( action == 'PV' ){
		ga('send', 'pageview');
	}
	ga('send', 'event', category, action, label, 1);
}


