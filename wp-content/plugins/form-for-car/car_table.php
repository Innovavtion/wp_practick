<?php
// расширять класс нужно после или во время admin_init
// класс удобнее поместить в отдельный файл.
class Car_Table extends WP_List_Table {
	//конструктор создает парент и вызывает методы из наследумого класса
	function __construct(){
		parent::__construct(array(
			'singular' => 'log',
			'plural'   => 'logs',
			'ajax'     => false,
		));

 		$this->bulk_action_handler();

		$this->prepare_items();

		add_action( 'wp_print_scripts', [ __CLASS__, '_list_table_css' ] );

		// if (isset($_GET["actions"]) and $_GET["actions"] == "view") {
		// 	$element = do_action('view', $_GET["id"]);
		// }

		if (isset($_GET["actions"]) and $_GET["actions"] == "delete") {
			do_action('delete', $_GET["id"]);
		}
	}

	// выводим элементы таблицы
	function prepare_items(){
		global $wpdb;
		
		$table_name = $wpdb->prefix . 'cars_inspection';

		$sql = "SELECT * FROM $table_name";
		
		$this->items = $wpdb->get_results($sql);

		// add_action( 'view', [ __CLASS__, 'view_colum' ]);

		add_action( 'delete', [ __CLASS__, 'delete_colum' ]);
	}

	// колонки таблицы
	function get_columns(){
		return array(
			// 'cb'            => '<input type="checkbox" />',
			'id'            => 'ID',
			'first_name' => 'Имя',
			'last_name'   => 'Фамилия',
			'email'   => 'Email',
			'phone_number'   => 'Номер телефона',
			'mark_car'   => 'Марка автомобиля',
			'cause'   => 'Причина'
		);
	}

	protected function get_sortable_columns() {
		return array(
			'id' => ['id', true]
		);
	}

	// css для таблицы
	static function _list_table_css(){
		?>
		<style>
			table.logs .column-id{ width:5em; }
		</style>
		<?php
	}

	// вывод каждой ячейки таблицы
	function column_default( $item, $colname ){

		if( $colname === 'id' ){
			// ссылки действия над элементом
			$actions = array();

			// $actions['view'] = sprintf( '<a href="%s">%s</a>', "admin.php?page=custom_page&actions=view&id=$item->id", 'view' );

			$actions['delete'] = sprintf('<a href="%s">%s</a>', "admin.php?page=custom_page&actions=delete&id=$item->id", 'delete');

			return esc_html( $item->id ) . $this->row_actions( $actions );
		}
		else {
			return isset($item->$colname) ? $item->$colname : print_r($item, 1);
		}

	}

	//db methonds
	static function delete_colum($id) {
		global $wpdb;

		$table_name = $wpdb->prefix . 'cars_inspection';

		$sql = "DELETE FROM $table_name WHERE id = $id";

		$wpdb->query($sql);

		wp_redirect('admin.php?page=custom_page');
	}

	// static function view_colum($id) {
	// 	global $wpdb;

	// 	$table_name = $wpdb->prefix . 'cars_inspection';

	// 	$sql = "SELECT * FROM $table_name WHERE id=$id";

	// 	$oneElemnt = $wpdb->get_results($sql);

	// 	var_dump($oneElemnt);

	// 	return $oneElemnt;
	// }
}