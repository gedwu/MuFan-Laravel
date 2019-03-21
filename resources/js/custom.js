$( document ).ready(function() {

    $( ".article-item" ).click(function(e) {
        e.preventDefault
        let id = $(this).data('article-id');

        let ip = ''
        let country = '';




        var nVer = navigator.appVersion;
        var nAgt = navigator.userAgent;
        var browserName  = navigator.appName;
        var fullVersion  = ''+parseFloat(navigator.appVersion);
        var majorVersion = parseInt(navigator.appVersion,10);
        var nameOffset,verOffset,ix;
        var full_browser_info;

// In Opera, the true version is after "Opera" or after "Version"
        if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
            browserName = "Opera";
            fullVersion = nAgt.substring(verOffset+6);
            if ((verOffset=nAgt.indexOf("Version"))!=-1)
                fullVersion = nAgt.substring(verOffset+8);
        }
// In MSIE, the true version is after "MSIE" in userAgent
        else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
            browserName = "Microsoft Internet Explorer";
            fullVersion = nAgt.substring(verOffset+5);
        }
// In Chrome, the true version is after "Chrome"
        else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
            browserName = "Chrome";
            fullVersion = nAgt.substring(verOffset+7);
        }
// In Safari, the true version is after "Safari" or after "Version"
        else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
            browserName = "Safari";
            fullVersion = nAgt.substring(verOffset+7);
            if ((verOffset=nAgt.indexOf("Version"))!=-1)
                fullVersion = nAgt.substring(verOffset+8);
        }
// In Firefox, the true version is after "Firefox"
        else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
            browserName = "Firefox";
            fullVersion = nAgt.substring(verOffset+8);
        }
// In most other browsers, "name/version" is at the end of userAgent
        else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) <
            (verOffset=nAgt.lastIndexOf('/')) )
        {
            browserName = nAgt.substring(nameOffset,verOffset);
            fullVersion = nAgt.substring(verOffset+1);
            if (browserName.toLowerCase()==browserName.toUpperCase()) {
                browserName = navigator.appName;
            }
        }
// trim the fullVersion string at semicolon/space if present
        if ((ix=fullVersion.indexOf(";"))!=-1)
            fullVersion=fullVersion.substring(0,ix);
        if ((ix=fullVersion.indexOf(" "))!=-1)
            fullVersion=fullVersion.substring(0,ix);

        majorVersion = parseInt(''+fullVersion,10);
        if (isNaN(majorVersion)) {
            fullVersion  = ''+parseFloat(navigator.appVersion);
            majorVersion = parseInt(navigator.appVersion,10);
        }

        // document.write(''
        //     +'Browser name  = '+browserName+'<br>'
        //     +'Full version  = '+fullVersion+'<br>'
        //     +'Major version = '+majorVersion+'<br>'
        //     +'navigator.appName = '+navigator.appName+'<br>'
        //     +'navigator.userAgent = '+navigator.userAgent+'<br>'
        // );

        full_browser_info = majorVersion +' '+ browserName+' '+fullVersion;
        console.log(full_browser_info);

        // Make a request for a user with a given ID
        axios.get(`${'https://cors-anywhere.herokuapp.com/'}http://gd.geobytes.com/GetCityDetails`)
            .then(function (response) {
                // handle success
                console.log('axios.get was fired!');
                console.log(response);
                ip =response.data.geobytesipaddress;
                country =response.data.geobytescountry;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {

                axios.post('/api/click_count', {
                    article_id: id,
                    ip_adress: ip,
                    country_name: country,
                    agent_info: full_browser_info
                })
                    .then(function (response) {
                        console.log('axios.post was fired!');
                        console.log(response);
                        // window.open('http://stackoverflow.com', '_blank');
                    })
                    .catch(function (error) {

                        console.log(error);
                    });

            });



    });

});
