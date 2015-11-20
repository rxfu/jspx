$.getJsUrl = function() {
	var url = $("script").last().attr("src");

	return url.substring(0, url.lastIndexOf("/") + 1);
}

$(document).ready(function() {
	$('a[href="' + $(location).attr('href') + '"]').parent('li').toggleClass('active').children('ul').collapse('toggle');
	$('#dialogConfirm').on('show.bs.modal', function(e) {
		$message = $(e.relatedTarget).attr('data-message');
		$(this).find('.modal-body p').text($message);
		$title = $(e.relatedTarget).attr('data-title');
		$(this).find('.modal-title').text($title);

		var form = $(e.relatedTarget).closest('form');
		$(this).find('.modal-footer #confirm').data('form', form);
	});
	$('#dialogConfirm').find('.modal-footer #confirm').on('click', function() {
		$(this).data('form').submit();
	});

	$(".data-table").dataTable({
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

	if ($('input:radio[name="opened"]').is(":checked") && $('input:radio[name="opened"]:checked').val() == '1') {
		$('#initSystem').addClass('disabled');
		$('#cleanSystem').addClass('disabled');
	}

	$(':input[name^="entry"]').focus(function() {
		$(this).closest('.panel').addClass('panel-primary');
	});
	$(':input[name^="entry"]').blur(function() {
		$(this).closest('.panel').removeClass('panel-primary');

		var form = $(this).closest('form');
		$.post(
			form.prop('action'), {
				'_token': form.find('input[name=_token]').val(),
				'_method': form.find('input[name=_method]').val(),
				'entry': $(this).val()
			});
	});
	$(':input[name^="file"]').focus(function() {
		$(this).closest('.panel').addClass('panel-primary');
	});
	$(':input[name^="file"]').blur(function() {
		$(this).closest('.panel').removeClass('panel-primary');
	});
	$(':input[name^="checked"]').click(function() {
		var form = $(this).closest('form');
		$.post(
			form.prop('action'), {
				'_token': form.find('input[name=_token]').val(),
				'_method': form.find('input[name=_method]').val(),
				'checked': ($(this).is(':checked') == true) ? 'true' : 'false'
			});
		if ($(this).is(':checked') == true) {
			$(':input[name=' + $(this).val() + ']').attr('disabled', false);
		} else {
			$(':input[name=' + $(this).val() + ']').attr('disabled', true);
		}
	});
	$(':input[name^="passed"]').click(function() {
		var form = $(this).closest('form');
		$.post(
			form.prop('action'), {
				'_token': form.find('input[name=_token]').val(),
				'_method': form.find('input[name=_method]').val(),
				'passed': ($(this).is(':checked') == true) ? 'true' : 'false'
			});
		if ($(this).is(':checked') == true) {
			$(':input[name=' + $(this).val() + ']').attr('disabled', true);
		} else {
			$(':input[name=' + $(this).val() + ']').attr('disabled', false);
		}
	});
	$(':input[name^="mark"]').focus(function() {
		$(this).closest('.panel').addClass('panel-primary');
	});
	$(':input[name^="mark"]').blur(function() {
		$(this).closest('.panel').removeClass('panel-primary');

		var form = $(this).closest('form');
		$.post(
			form.prop('action'), {
				'_token': form.find('input[name=_token]').val(),
				'_method': form.find('input[name=_method]').val(),
				'mark': $(this).val()
			});
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
});