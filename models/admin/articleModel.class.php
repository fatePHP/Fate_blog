<?php 
    /**
     * @brief 文章模型 
     */
    class articleModel extends IModel {
        
            public function init(){
                  $this->table = 'posts';
            }
            
            public function getAll(){
                
                $sql = $this->fields('a.ID,a.post_date,a.post_title,a.comment_count,u.display_name,t.name')->join(' as a INNER JOIN blog_users as u ON a.post_author = u.ID INNER JOIN blog_term_relationships as tr ON a.ID=tr.object_id INNER JOIN blog_term_taxonomy as tt ON tr.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN blog_terms as t on tt.term_id= t.term_id')->where("a.post_type = 'post' AND (a.post_status = 'publish' OR a.post_status = 'future' OR a.post_status = 'draft' OR a.post_status = 'pending' OR a.post_status = 'private') ")->order('a.post_date DESC')->sql();
                $data = $this->fetchAll($sql);
                return $data;
            }
            
            public function getTime(){
                    
                  $sql = $this->fields('YEAR(post_date) as year,MONTH(post_date) as month')->where('post_type="post"')->order('post_date DESC')->sql();
                  $data = $this->fetchAll($sql);
                 
                  return $data;
            }
            
    }


?>