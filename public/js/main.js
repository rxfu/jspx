$.getJsUrl = function() {
	var url = $("script").last().attr("src");

	return url.substring(0, url.lastIndexOf("/") + 1);
}

$(document).ready(function() {
	$('a[href="' + $(location).attr('href') + '"]').parent('li').toggleClass('active').children('ul').collapse('toggle');

	$(".data-table").DataTable({
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "全部"]
		],
		"pagingType": "full_numbers",
		"columnDefs": [{
			"orderable": false,
			"targets": "nosort"
		}, {
			"render": function(data, type, row) {
				if (data == 1) {
					return '<i class="fa fa-check fa-lg text-success"></i>';
				} else {
					return '<i class="fa fa-times fa-lg text-danger"></i>';
				}
			},
			"targets": "yesno"
		}],
		"language": {
			"url": $.getJsUrl() + "plugins/dataTables/i18n/zh_cn.lang"
		}
	});

	$(':input[name="permissions[]"]').click(function() {
		var form = $(this).closest('form');
		var permissions = $(':input[name="permissions[]"]:checked').map(function() {
			return $(this).val();
		}).get();
		$.post(
			form.prop('action'), {
				'_token': form.find('input[name=_token]').val(),
				'_method': form.find('input[name=_method]').val(),
				'permissions[]': permissions
			});
	});

	$('#major').chained('#department');

	$('#statistics-table').DataTable({
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "全部"]
		],
		"pagingType": "full_numbers",
		"language": {
			"url": $.getJsUrl() + "plugins/dataTables/i18n/zh_cn.lang"
		},
		initComplete: function() {
			this.api().columns().every(function() {
				var column = this;
				var select = $('<select><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function() {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column.search(val ? '^' + val + '$' : '', true, false).draw();
					});

				column.data().unique().sort().each(function(d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		}
	});
});