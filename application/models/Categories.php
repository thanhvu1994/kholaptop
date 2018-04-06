<?php
class Categories extends CI_Model {

    public function __construct()
    {
	    $this->load->database();
		$this->load->helper('url');
		$this->load->model('products');
    }

    public function getRule() {
    	$rules = [
    		['category_name', 'Danh mục', 'trim|required'],
    	];

    	return $rules;
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('categories', $conditions);

        	return $query->row('1', 'Categories');
		} else {
			$query = $this->db->query("SELECT * FROM ci_categories ORDER BY created_date desc");
			return $query->result('Categories');
		}
	}

	public function set_model($data_insert)
	{
	    if (!isset($data_insert['parent_id']) || $data_insert['parent_id'] == 0) {
	    	$type_level = 1;
	    } else {
	    	$parent = $this->get_model(['id' => $data_insert['parent_id']]);
	    	if (count($parent) > 0) {
	    		$type_level = (int)$parent->type_level + 1;
	    	} else {
	    		$type_level = 1;
	    	}
	    }
	    $data_insert['created_date'] = date('Y-m-d H:i:s');
	    $data_insert['update_date'] = date('Y-m-d H:i:s');
	    $data_insert['slug'] = $this->generateSlug($data_insert['category_name']);
        if (isset($data_insert['category_name_en'])) {
            $data_insert['slug_en'] = $this->generateSlug($data_insert['category_name_en']);
        }
	    $data_insert['type_level'] = $type_level;
	    return $this->db->insert('categories', $data_insert);
	}

	public function update_model($id, $data_insert)
	{
	    if ($data_insert['parent_id'] == 0) {
	    	$type_level = 1;
	    } else {
	    	$parent = $this->get_model(['id' => $data_insert['parent_id']]);
	    	if (count($parent) > 0) {
	    		$type_level = (int)$parent->type_level + 1;
	    	} else {
	    		$type_level = 1;
	    	}
	    }
	    $data_insert['update_date'] = date('Y-m-d H:i:s');
        $data_insert['slug'] = $this->generateSlug($data_insert['category_name']);
        if (isset($data_insert['category_name_en'])) {
            $data_insert['slug_en'] = $this->generateSlug($data_insert['category_name_en']);
        }
        if (!isset($data_insert['is_featured'])) {
            $data_insert['is_featured'] = 0;
        }
	    $data_insert['type_level'] = $type_level;

	    $this->db->where('id', $id);
        $this->db->update('categories', $data_insert);
	}

	public function rChilds($parent_id, &$items, $level, $id, $type) {
		if ($level <= 1) {
			$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$parent_id." AND id != ".$id.' AND type = "'.$type.'"');
			$childs = $query->result('Categories');

			if (count($childs) > 0) {
				$str = '';
				for ($i=0; $i < $level; $i++) {
					$str .= '---';
				}
				$level++;
				foreach ($childs as $child) {
					$items[$child->id] = $str.$child->category_name;
					$this->rChilds($child->id, $items, $level, $id, $type);
				}
			}
		}
	}

	public function get_dropdown_category($id, $type = 'menu') {
		$items = [];
		$query = $this->db->query('SELECT * FROM ci_categories WHERE parent_id = 0 AND id != '.$id.' AND type = "'.$type.'"');
		$parents = $query->result('Categories');
		$level = 1;
		if (count($parents) > 0) {
			foreach ($parents as $row) {
				$items[$row->id] = $row->category_name;
				$this->rChilds($row->id, $items, $level, $id, $type);
			}
		}

		return $items;
	}

    public function get_dropdown_category_product($id, $type = 'category') {
        $items = array();

        $this->db->select(array('id','category_name'));
        $this->db->from('categories');
        $this->db->where('id !=', $id);
        $this->db->where('type', $type);
        $this->db->where('parent_id', 0);
        $query = $this->db->get();

        $rootCates = $query->result('categories');
        if(!empty($rootCates)){
            foreach($rootCates as $cate){
                $items[$cate->id] = $cate->category_name;

                $this->db->select(array('id','category_name'));
                $this->db->from('categories');
                $this->db->where('parent_id', $cate->id);
                $query1 = $this->db->get();

                $subCates = $query1->result('categories');

                if(!empty($subCates)){
                    foreach($subCates as $subCate){
                        $items[$subCate->id] = '-- '. $subCate->category_name;

                        $this->db->select(array('id','category_name'));
                        $this->db->from('categories');
                        $this->db->where('parent_id', $subCate->id);
                        $query2 = $this->db->get();

                        $subsubCates = $query2->result('categories');

                        if(!empty($subsubCates)){
                            foreach($subsubCates as $subsubCate){
                                $items[$subsubCate->id] = '---- '. $subsubCate->category_name;
                            }
                        }
                    }
                }
            }
        }

        return $items;
    }

	public function delete_model($id) {
		$arr_id_del = [];
		$model = $this->get_model(['id' => $id]);
		if (count($model) > 0) {
			if (is_file('./'.$model->thumb)) {
				unlink('.'.$model->thumb);
			}
			$arr_id_del[$id] = $id;
			$this->db->where('id', $id);
	  		$this->db->delete('categories');
	  		$this->delete_all_child($id, $arr_id_del);
		}

  		return $arr_id_del;
	}

	public function delete_all_child($id, &$arr_id_del) {
		$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$id);
		$models =  $query->result('Categories');

		if (count($models) > 0) {
			foreach ($models as $model) {
				if (is_file('.'.$model->thumb)) {
					unlink('.'.$model->thumb);
				}
				$arr_id_del[$model->id] = $model->id;
				$this->db->where('id', $model->id);
        		$this->db->delete('categories');
        		$this->delete_all_child($model->id, $arr_id_del);
			}
		}
	}

	public function get_parent_name() {
		$query = $this->db->get_where('categories', array('id' => $this->parent_id));

		if ($query->row()) {
			return $query->row()->category_name;
		}

    	return '';
	}

	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}

	public function get_image() {
		if (is_file('.'.$this->thumb)) {
			return base_url($this->thumb);
		}

		return '';
	}

	public function rChildsFE($parent_id) {
		$items = [];
		$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$parent_id." AND type = 'menu'  ORDER BY display_order asc");
		$childs = $query->result('Categories');

		if (count($childs) > 0) {
			foreach ($childs as $child) {
				$items[$child->id] = [
					'name' => $child->getFieldFollowLanguage('category_name'),
					'url' => $child->url,
					'child' => $this->rChildsFE($child->id),
				];
			}
		}

		return $items;
	}

	public function get_menuFE() {
		$items = [];
		$query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = 0 AND type = 'menu' ORDER BY display_order asc");
		$models = $query->result('Categories');
		$level = 1;

		if (count($models)) {
			foreach ($models as $model) {
				$items[$model->id] = [
					'name' => $model->getFieldFollowLanguage('category_name'),
					'url' => $model->url,
					'child' => $this->rChildsFE($model->id),
				];
			}
		}
		return $items;
	}

    public function rChildCategoriesFE($parent_id) {
        $items = [];
        $query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$parent_id);
        $childs = $query->result('Categories');

        if (count($childs) > 0) {
            foreach ($childs as $child) {
                $items[$child->id] = [
                    'name' => $child->getFieldFollowLanguage('category_name'),
                    'title' => $child->getFieldFollowLanguage('title'),
                    'slug' => $child->getFieldFollowLanguage('slug'),
                    'child' => $this->rChildCategoriesFE($child->id),
                ];
            }
        }

        return $items;
    }

    public function getChildCategoriesFE($parent_id) {
        $items = [];
        $query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$parent_id);
        $childs = $query->result('Categories');

        if (count($childs) > 0) {
            foreach ($childs as $child) {
                $items[$child->id] = [
                    'name' => $child->getFieldFollowLanguage('category_name'),
                    'title' => $child->getFieldFollowLanguage('title'),
                    'slug' => $child->getFieldFollowLanguage('slug'),
                    'child' => $this->rChildCategoriesFE($child->id),
                    'url' => $child->getUrl(),
                    'countProducts' => $child->countProducts(),
                ];
            }
        }

        return $items;
    }

    public function getCategoryFE() {
        $items = [];
        $query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = 0 AND type = 'category' ORDER BY display_order asc");
        $models = $query->result('Categories');
        $level = 1;
        if (count($models)) {
            foreach ($models as $model) {
                $items[$model->id] = [
                    'name' => $model->getFieldFollowLanguage('category_name'),
                    'title' => $model->getFieldFollowLanguage('title'),
                    'slug' => $model->getFieldFollowLanguage('slug'),
                    'child' => $this->rChildCategoriesFE($model->id),
                    'url' => $model->getUrl(),
                ];
            }
        }
        return $items;
    }

    public function getDataFE(){
        $query = $this->db->query("SELECT * FROM ci_categories WHERE type = 'category' ORDER BY display_order asc LIMIT 6");
        return $query->result('Categories');
    }

    public function getCategoryBySlug($slug){
        if ($this->session->userdata['languages'] == 'vn'){
            $query = $this->db->get_where('categories', array('slug' => $slug) );
            $category = $query->row(0,'Categories');

            if(empty($category)){
                $query = $this->db->get_where('categories', array('slug_en' => $slug) );
                return $query->row(0,'Categories');
            }else{
                return $category;
            }
        }else{
            $query = $this->db->get_where('categories', array('slug_en' => $slug) );
            $category = $query->row(0,'Categories');

            if(empty($category)){
                $query = $this->db->get_where('categories', array('slug' => $slug) );
                return $query->row(0,'Categories');
            }else{
                return $category;
            }
        }
    }

    public function getProducts($limit, $start){
        $products = array();

        $this->db->select('id');
        $this->db->from('categories');
        $this->db->where('parent_id', $this->id);
        $this->db->or_where('id', $this->id);
        $query = $this->db->get();

        $categories = $query->result();
        $cateIds = array();

        if(!empty($categories)){
            foreach($categories as $category){
                $cateIds[] = $category->id;
            }
        }

        if(!empty($cateIds)){
            $this->db->select('id');
            $this->db->from('categories');
            $this->db->where_in('parent_id', $cateIds);
            $query1 = $this->db->get();

            $subCategories = $query1->result();

            if(!empty($subCategories)){
                foreach($subCategories as $category){
                    if(!in_array($category->id, $cateIds)){
                        $cateIds[] = $category->id;
                    }
                }
            }
        }

        $productIds = array();
        if(!empty($cateIds)){
            $this->db->select('product_id');
            $this->db->from('product_categories');
            $this->db->where_in('category_id', $cateIds);
            $query2 = $this->db->get();

            $productCates = $query2->result();

            if(!empty($productCates)){
                foreach($productCates as $productCate){
                    $productIds[] = $productCate->product_id;
                }
            }
        }

        if(!empty($productIds)){
            $this->db->limit($limit, $start);
            $this->db->from('products');
            $this->db->where_in('id', $productIds);

            if(isset($_GET['sort'])){
                $temp = explode('_', $_GET['sort']);

                if(count($temp) == 2){
                    if($temp[0] == 'name'){
                        $this->db->order_by('product_'.$temp[0], $temp[1]);
                    }else{
                        $this->db->order_by($temp[0], $temp[1]);
                    }
                }else{
                    $this->db->order_by('created_date', 'desc');
                }
            }else{
                $this->db->order_by('created_date', 'desc');
            }

            $query3 = $this->db->get();

            $products = $query3->result('products');
        }

        return $products;
    }

    public function countProducts(){
        $this->db->select('id');
        $this->db->from('categories');
        $this->db->where('parent_id', $this->id);
        $this->db->or_where('id', $this->id);
        $query = $this->db->get();

        $categories = $query->result();
        $cateIds = array();

        if(!empty($categories)){
            foreach($categories as $category){
                $cateIds[] = $category->id;
            }
        }

        if(!empty($cateIds)){
            $this->db->select('id');
            $this->db->from('categories');
            $this->db->where_in('parent_id', $cateIds);
            $query1 = $this->db->get();

            $subCategories = $query1->result();

            if(!empty($subCategories)){
                foreach($subCategories as $category){
                    if(!in_array($category->id, $cateIds)){
                        $cateIds[] = $category->id;
                    }
                }
            }
        }

        if(!empty($cateIds)){
            $this->db->select('product_id');
            $this->db->from('product_categories');
            $this->db->where_in('category_id', $cateIds);
            $query2 = $this->db->get();

            $productCates = $query2->result();
        }

        return count($productCates);
    }

    public function getAllProducts($limit, $start){
        $this->db->limit($limit, $start);

        $query1 = $this->db->get_where('products', array('status' => STATUS_ACTIVE));
        $products = $query1->result('Products');

        return $products;
    }

    public function countAllProducts() {
        $this->db->where('status', STATUS_ACTIVE);
        $this->db->from('products');
        return $this->db->count_all_results();
    }

    public function getNews($limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('news', array('category_id' => $this->id) );
        $news = $query->result('News');

        return $news;
    }

    public function countNews() {
        $this->db->where('category_id', $this->id);
        $this->db->from('news');
        return $this->db->count_all_results();
    }

    public function getMenuProductFooter() {
    	$query = $this->db->query("SELECT * FROM ci_categories WHERE type = 'category' ORDER BY display_order asc LIMIT 6");
        return $query->result('Categories');
    }

    public function getTableCategory($level = 0) {
        $str = '';
        for ($i=0; $i < $level; $i++) {
            $str .= '---';
        }
        $url = 'admin/category';
        if ($this->type == 'menu') {
            $url = 'admin/menu';
        } elseif ($this->type == 'news') {
            $url = 'admin/categoryNews';
        }

        if ($this->type == 'category') {
            $checked = $this->is_featured ? 'checked' : '';
            echo '<tr id="tr-'.$this->id.'">
                <td class="text-center check-element"><input type="checkbox" name="select[]" value="'.$this->id.'"></td>
                <td>'.$str.' '.$this->category_name.'</td>
                <td>'.$this->get_parent_name().'</td>
                <td>
                    <input type="checkbox" '.$checked.' class="js-switch publish-ajax" data-color="#13dafe" data-id="'.$this->id.'" value="1"/>
                </td>
                <td>'.$this->get_update_date().'</td>
                <td class="button-column">
                    <a class="btn btn-danger" href="'.base_url($url.'/update/'.$this->id).'"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger button-delete" href="javascript:void(0)" title="Delete" data-id="'.$this->id.'"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>';
        } elseif ($this->type == 'news') {
            echo '<tr id="tr-'.$this->id.'">
                    <td class="text-center check-element"><input type="checkbox" name="select[]" value="'.$this->id.'"></td>
                    <td>'.$str.' '.$this->category_name.'</td>
                    <td>'.$this->get_update_date().'</td>
                    <td class="button-column">
                        <a class="btn btn-danger" href="'.base_url($url.'/update/'.$this->id).'"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger button-delete" href="javascript:void(0)" title="Delete" data-id="'.$this->id.'"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>';
        } else {
            echo '<tr id="tr-'.$this->id.'">
                    <td class="text-center check-element"><input type="checkbox" name="select[]" value="'.$this->id.'"></td>
                    <td>'.$str.' '.$this->category_name.'</td>
                    <td>'.$this->get_parent_name().'</td>
                    <td>'.$this->get_update_date().'</td>
                    <td class="button-column">
                        <a class="btn btn-danger" href="'.base_url($url.'/update/'.$this->id).'"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger button-delete" href="javascript:void(0)" title="Delete" data-id="'.$this->id.'"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>';
        }
        $query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = ".$this->id." AND type = '".$this->type."' ORDER BY display_order asc, category_name asc");
        $categories =  $query->result('Categories');

        if (count($categories) > 0) {
            $level++;
            foreach ($categories as $child) {
                $child->getTableCategory($level);
            }
        }
    }

    public function getFieldFollowLanguage($field) {
		if ($this->session->userdata['languages'] == 'en')
			$field = $field.'_en';

		return $this->$field;
    }

    public function getCategoryNewFE() {
        $items = [];
        $query = $this->db->query("SELECT * FROM ci_categories WHERE parent_id = 0 AND type = 'news' ORDER BY display_order asc");
        $models = $query->result('Categories');
        $level = 1;
        if (count($models)) {
            foreach ($models as $model) {
                $items[$model->id] = [
                    'name' => $model->getFieldFollowLanguage('category_name'),
                    'title' => $model->getFieldFollowLanguage('title'),
                    'slug' => $model->getFieldFollowLanguage('slug'),
                    'child' => $this->rChildCategoriesFE($model->id),
                ];
            }
        }
        return $items;
    }

    public function generateSlug($str){
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `ci_categories`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }

        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);

        if (empty($str)) {
            return 'n-a';
        }

        return $str.'-'.$maxid;
    }

    public function getUrl(){
        return base_url('').$this->slug.'c.html';
    }

    public function getUrlCustom($category){
        return anchor(''.$category['slug'].'n.html', $category['name'], ['title' => $category['name']]);
    }

    public function getFeatureCategories(){
        $query = $this->db->query("SELECT * FROM ci_categories WHERE is_featured = '".STATUS_ACTIVE."' AND type = 'category' ORDER BY display_order asc");
        $models = $query->result('Categories');

        return $models;
    }

    public function getBreadCrumb(){
        if($this->parent_id != 0):
        $parent = $this->get_model(array('id' => $this->parent_id));
            if($parent):
                if($parent->parent_id != 0):
                $parentParent = $this->get_model(array('id' => $parent->parent_id));
                    if($parentParent):
                        echo '<li class="category3"><a href="'.$parentParent->getUrl().'" title="'.$parentParent->category_name.'">'.$parentParent->category_name.'</a><span>/ </span></li>';
                    endif;
                endif;
            echo '<li class="category3"><a href="'.$parent->getUrl().'" title="'.$parent->category_name.'">'.$parent->category_name.'</a><span>/ </span></li>';
            endif;
        endif;
        echo '<li class="category3"><a href="'.$this->getUrl().'" title="'.$this->category_name.'">'.$this->category_name.'</a></li>';
    }
}