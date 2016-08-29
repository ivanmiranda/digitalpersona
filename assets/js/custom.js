function load(page) {
	$.ajax({
		type		: 'GET',
		url		: page,
		success	: function(data) {
			try {
				$('#content').html(data);
			} catch (err) {
				alert(err);
			}
		}
	});
}

function push(page) {

	$.ajax({
		beforeSend	: function() {
			$('.help-blok').remove();
		},
		type		: 'GET',
		url		: page,
		success	: function(data) {
			try {

				console.log('Data has been pushed..');

				var res = jQuery.parseJSON(data);

				if (res.result) {

					$.each(res, function(key, value) {

						if (key == 'reload') {

							load(value);

							alert('Data saved..');

						}

					});

				} else if (res.result == false) {

					$.each(res, function(key, value) {

						if (key != 'result' && key != 'server' && key != 'notif' ) {

							$('#'+key).after("<span class='help-blok'>"+value+"</span>")

						} else if (key == 'server') {

							alert(value);

						}
					});

				}

			} catch (err) {

				alert(err.message);

			}
		}
	});

}
