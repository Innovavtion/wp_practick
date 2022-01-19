<?php
/*
Plugin Name: Form-for-car
Description: The best plagin
Version: 1.9
Author: N
*/

//----- Страница с табличкой
//Если пользователь админ создает экземпляр класса и вызвает фунцию конструкт
if(is_admin())
{
    new Custom_Wp_List_Table();
}

//Класс Custom_Wp_List_Table() создаст страницу для загрузки таблицы
class Custom_Wp_List_Table
{
    //конструктор вызывающий функцию add_menu_table_page()
    public function __construct()
    {
        add_action( 'admin_menu', array($this, 'add_menu_table_page' ));

        add_action( 'delete', [ __CLASS__, 'delete_colum' ]);

        if (isset($_GET["actions"]) and $_GET["actions"] == "delete") {
			do_action('delete', $_GET["id"]);
		}
    }

    //Используется для удаления колонки
    static function delete_colum($id) {
		global $wpdb;

		$table_name = $wpdb->prefix . 'cars_inspection';

		$sql = "DELETE FROM $table_name WHERE id = $id";

		$wpdb->query($sql);
	}

    //Добавление меню в админке
    public function add_menu_table_page()
    {
        add_menu_page( 'Заявки на техосмотр', 'Заявки на техосмотр', 'manage_options', 'table_cause_car', array($this, 'list_table_page') );
    }

    //создает экземпляр класса и выводит таблицу на странице
    public function list_table_page()
    {
        $exampleListTable = new Cause_Car_Table();
        $exampleListTable->prepare_items();
        ?>
            <div class="wrap">
                <div id="icon-users" class="icon32"></div>
                <h2>Заявки на техосмотр</h2>
                <?php $exampleListTable->display(); ?>
            </div>
        <?php
    }
}

//WP_List_Table не загружается автоматически, поэтому нам нужно загрузить его в нашем приложении 
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

//класс таблицы который расширен классом WP_List_Table
class Cause_Car_Table extends WP_List_Table
{
	//вызов всех методов для создания таблицы и ее вывода
    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();

        $data = $this->table_data();
        usort( $data, array( &$this, 'sort_data' ) );

        $perPage = 2;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);

        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );

        $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }

    //Получение колонок
    public function get_columns()
    {
        $columns = array(
            'id'            => 'ID',
			'first_name' => 'Имя',
			'last_name'   => 'Фамилия',
			'email'   => 'Email',
			'phone_number'   => 'Номер телефона',
			'mark_car'   => 'Марка автомобиля',
			'cause'   => 'Причина'
        );

        return $columns;
    }

    //получение скрытых полей
    public function get_hidden_columns()
    {
        return array();
    }

    //получение отсортированных полей
    public function get_sortable_columns()
    {
        return array('id' => array('id', false));
    }

    //Получение данных из бд
    private function table_data()
    {
        global $wpdb;
		
		$table_name = $wpdb->prefix . 'cars_inspection';

		$sql = "SELECT * FROM $table_name";
		
		$data = $wpdb->get_results($sql);

		$data = json_decode(json_encode($data), true);

		// echo '<br>';
		// print_r($data);
		// echo '</br>';

        return $data;
    }

    //Вывод одной колонки
    public function column_default( $item, $column_name )
    {
        if( $column_name === 'id' ){
			$actions = array();

			$actions['delete'] = sprintf('<a href="%s">%s</a>', "admin.php?page=table_cause_car&actions=delete&id=$item[id]", 'delete');

			return esc_html( $item['id'] ) . $this->row_actions( $actions );
		}
		else {
			return isset($item[$column_name]) ? $item[$column_name] : print_r($item, 1);
		}
    }

    //сортировка таблицы по id
    private function sort_data( $a, $b )
    {
        //Инициализация значений
        $orderby = 'id';
        $order = 'asc';

        //если orderby неустановлин использовать id
        if(!empty($_GET['orderby']))
        {
            $orderby = $_GET['orderby'];
        }

         //если orderby неустановлин использовать asc
        if(!empty($_GET['order']))
        {
            $order = $_GET['order'];
        }


        $result = strcmp( $a[$orderby], $b[$orderby] );

        if($order === 'asc')
        {
            return $result;
        }

        return -$result;
    }
}
//----- Страница с табличкой

//----- Форма для пользователя
//Функция для вывода данных у пользователя
function form_cause($first_name, $last_name, $email, $phone_number, $mark_car, $cause) {
   echo '<h3>Записаться на техосмотр автомобиля</h3>';

   echo '
	   <style>
		   form > div {
		    	margin-bottom:5px;
		   }

		   input{
		    	margin-bottom:4px;
		   }

		   form {
		   		width:500px;
  				padding:20px;
  				margin: 10px auto;
		   }
	   </style>
   ';

   echo '
	   <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
		   <div>
			   <label for="firstname">Имя <strong>*</strong></label>
			   <input type="text" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
		   </div>

		   <div>
			   <label for="lastname">Фамилия <strong>*</strong></label>
			   <input type="text" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
		   </div>

		   <div>
			   <label for="email">E-mail <strong>*</strong></label>
			   <input type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
		   </div>

		   <div>
			   <label for="phonenumber">Номер телефона <strong>*</strong></label>
			   <input type="text" name="pnumber" value="' . ( isset( $_POST['pnumber']) ? $phone_number : null ) . '">
		   </div>

		   <div>
			   <label for="markcar">Марка автомобиля <strong>*</strong></label>
			   <input type="text" name="mcar" value="' . ( isset( $_POST['mcar']) ? $mark_car : null ) . '">
		   </div>

		   <div>
			   <label for="cause">Причина обращения<strong>*</strong></label>
			   <textarea name="cause">' . ( isset( $_POST['cause']) ? $cause : null ) . '</textarea>
		   </div>

		   <input type="submit" name="submit" value="Отправить заявку"/>
	   </form>
   ';
}

function validation_cause($first_name, $last_name, $email, $phone_number, $mark_car, $cause) {
	global $reg_errors;

	$reg_errors = new WP_Error;

	//Патерны по которым будет проверяться имя и номера телефона(Сделано тоже только под русские номера)
	$pattern_phone = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';

	$pattern_name = '/[^A-Za-z0-9]/';

	//Сама реализация валидации
	//Проверка ФИО
	if (!preg_match($pattern_name, $first_name) && !preg_match($pattern_name, $last_name)) {
    	$reg_errors->add('fio', 'Ваше имя или фамилия написаны не на кирилице');
	}

	if (mb_strlen($first_name) < 4 && mb_strlen($last_name) < 4){
        $reg_errors->add('fio-size', 'Ваше имя или фамилия меньше 4 символов');
    }

    //Проверка email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $reg_errors->add('email', 'Формат email не верный');
    }

    if (empty($email)){
        $reg_errors->add('email-null', 'Поле email пусто');
    }

    //Проверка номера телефона
    if (!preg_match($pattern_phone, $phone_number)){
        $reg_errors->add('phone', 'Формат номера телефона неверный(Только номера РФ)');
    }

    if (empty($phone_number)){
        $reg_errors->add('phone-null', 'Поле номера телефона пусто');
    }

    //Проверка марки машины и текста
    if (empty($mark_car) && empty($cause)){
        $reg_errors->add('info', 'Марка автомобиля или Причина обращения незаполнены');
    }

    //Проверяем вышла ли ошибка, если да то через цикл выводим все ошибки
    if ( is_wp_error( $reg_errors ) ) {

	    foreach ( $reg_errors->get_error_messages() as $error ) {

	        echo '<div>';
	        echo '<strong>ERROR</strong>:';
	        echo $error . '<br/>';
	        echo '</div>';

	    }
	}
}

function insert_cause() {
	global $reg_errors, $first_name, $last_name, $email, $phone_number, $mark_car, $cause;
	global $wpdb;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $causedata = array(
	        'first_name'    =>   $first_name,
	        'last_name'    =>   $last_name,
	        'email'    =>   $email,
	        'phone_number' => $phone_number,
	        'mark_car' => $mark_car,
	        'cause' => $cause
        );

        $bool = $wpdb->insert($wpdb->base_prefix . 'cars_inspection', $causedata);

        if($bool == false) {
        	echo 'Ваша заявка уже расcматривается';
        } else {
        	echo 'Заявка отправлена';
        }
    }
}

function custom_cause_form() {
	global $first_name, $last_name, $email, $phone_number, $mark_car, $cause;
    if ( isset($_POST['submit'] ) ) {
        validation_cause (
	        $_POST['fname'],
	        $_POST['lname'],
	        $_POST['email'],
	        $_POST['pnumber'],
	        $_POST['mcar'],
	        $_POST['cause'],
    	);

	    // проверка безопасности введенных данных
	    $first_name    =   sanitize_text_field( $_POST['fname'] );
	    $last_name   =  sanitize_text_field( $_POST['lname'] );
	    $email      =   sanitize_email( $_POST['email'] );
	    $phone_number    =   sanitize_text_field( $_POST['pnumber'] );
	    $mark_car =   sanitize_text_field( $_POST['mcar'] );
	    $cause  =   sanitize_text_field( $_POST['cause'] );

	    // вызов @function complete_registration, чтобы создать пользователя
	    // только если не обнаружено WP_error
	    insert_cause (
	    	$first_name, 
	    	$last_name, 
	    	$email, 
	    	$phone_number, 
	    	$mark_car, 
	    	$cause
	    );
    }

    form_cause(
    	$first_name, 
	    $last_name, 
	    $email, 
	    $phone_number, 
	    $mark_car, 
	    $cause
    );
}
//----- Форма для пользователя

//----- Настройка плагина
add_shortcode( 'cr_custom_cause', 'custom_cause' );

function custom_cause() {
    ob_start();
    custom_cause_form();
    return ob_get_clean();
}

//Хук который создает бд при активации плагина
register_activation_hook( __FILE__, 'create_plugin_tables' );

function create_plugin_tables()
{
	global $wpdb;
	
	$table_name = $wpdb->base_prefix . 'cars_inspection';
	
	$sql = "CREATE TABLE $table_name (
 		id int(11) NOT NULL AUTO_INCREMENT,
 		first_name varchar(255) NOT NULL,
 		last_name varchar(255) NOT NULL,
 		email varchar(255) NOT NULL UNIQUE,
 		phone_number varchar(255) NOT NULL,
 		mark_car varchar(255) NOT NULL,
 		cause text NOT NULL,
 		UNIQUE KEY id (id)
	);";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

//Хук который удаляет бд при диактивации плагина
register_deactivation_hook( __FILE__, 'drop_plugin_tables');

function drop_plugin_tables()
{
	global $wpdb;

	$table_name = $wpdb->prefix . 'cars_inspection';

	$sql = "DROP TABLE IF EXISTS $table_name";
	
	$wpdb->query($sql);
}
//----- Настройка плагина

?>