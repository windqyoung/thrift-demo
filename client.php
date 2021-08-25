<!doctype html>
<html>
    <head>
        <script src="vendor/apache/thrift/lib/js/src/thrift.js"></script>
        <script src="gen-js/common_types.js"></script>
        <script src="gen-js/service_types.js"></script>
        <script src="gen-js/DemoService.js"></script>
    </head>
	<body>
	<div id="rs"></div>

    <script>
    	var rse = document.querySelector('#rs');
        var trans = new Thrift.Transport(Api.Common.SERVICE_URI_WEB);
        var pro = new Thrift.TJSONProtocol(trans);

        var service = new Api.Service.DemoServiceClient(pro);
        var req = new Api.Service.PersonRequest({name: 'WebName'})
        service.getPerson(req, (rs) => {
            console.log(rs);
			rse.innerHTML += JSON.stringify(rs)
			rse.innerHTML += '<hr>'
        });

        service.add(1, 2, (rs) => {
            console.log(rs);
			rse.innerHTML += JSON.stringify(rs)
			rse.innerHTML += '<hr>'
        })
    </script>
	</body>
</html>
