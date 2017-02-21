<?php
/**
* PHP常用的一些算法题
 *
*/
		//冒泡排序
		function bubble_sort($array)
		{
		    $count=count($array);
		    if($count <= 0){
		        return false;
		    }
		    for($i=0;$i<$count;$i++){
		        for($j=0;$j<$count-$i-1;$j++){
		            if( $array[$j] > $array[$j+1] ){
		                $temp=$array[$j];
		                $array[$j]=$array[$j+1];
		                $array[$j+1]=$temp;
		            }
		        }
		    }
		    return $array;
		}


         //快排
        function quick_sort($array)
        {
            $count=count($array);
            if($count <= 1){
                return $array;
            }
            $key=$array[0];
            $array_left=array();
            $array_right=array();
            for($i=1;$i<$count;$i++){
                if($array[$i] < $key ){
                    $array_left[]=$array[$i];
                }else{
                    $array_right[]=$array[$i];
                }
            }
            $array_left=quick_sort($array_left);
            $array_right=quick_sort($array_right);
            return array_merge($array_left,array($key),$array_right);
        }


/*        $myarray=array(1,5,3,4,12,10,8);
        print_r(bubble_sort($myarray));
        echo "<br/>";
        print_r(quick_sort($myarray));
        echo "<br/>";*/

		/**
		 * 快速查找值第一次出现的位置 二分法查找
		 * @param array $array          数组
		 * @param string $k             要找的值
		 * @param int $low              查找范围的最小键值
		 * @param int $high             范围的最大键值   
		 */

		function search($array, $k, $low=0, $high=0)
		{    
		 //判断是否为第一次调用   
		    if(count($array)!=0 and $high == 0){
		        $high = count($array);   
		    }
		    //如果还存在剩余的数组元素
		    if($low <= $high){
		     //取$low和$high的中间值
		        $mid = intval(($low+$high)/2);
		        //如果找到则返回
		        if ($array[$mid] == $k){
		            return $mid;
		        }
		        //如果没有找到，则继续查找
		        elseif ($k < $array[$mid]){
		            return search($array, $k, $low, $mid-1);
		        }
		        else {
		            return search($array, $k, $mid+1, $high);
		        }
		    }
		    return -1;
		}
		/*$array = array(4,5,7,8,9,10,8);                  //测试search函数
		//echo search($array,3);                          //调用search函数并输出查找结果
		echo count($array);*/

        /**
         * 顺序查找
         * @param $array 需要查找的数组
         * @param $k     需要查找的值
         */

		function search1($array,$k)

        {

            foreach ($array as $arr=>$arr_value)
            {

                echo $arr_value==$k ? $arr_value:null;


            }

        }
            $array = array(4,5,7,8,9,10,8);
            search1($array,7);




		/**
		     * 去掉二维数组中的重复项
		     * @param $array2D          数组
		     * @param $keyArray         还原时字段对应的key
		     * @return array            去掉了重复项的数组
		     */
		     function array_unique_fb($array2D,$keyArray){
		        $temp=array();
		        foreach ($array2D as $v){
		            $v = join(",",$v);  //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
		            $temp[] = $v;
		        }
		        $temp = array_unique($temp);    //去掉重复的字符串,也就是重复的一维数组
		        foreach ($temp as $k => $v){
		            //$temp[$k] = explode(",",$v);   //再将拆开的数组重新组装
		           $temp[$k]= array_combine($keyArray ,explode(",",trim($v)));
		        }
		        return $temp;
		    }
/*		 
		$testArray=array_unique_fb(array(array('a'=>1,'b'=>2,'c'=>3),
		    array('a'=>1,'b'=>2,'c'=>3),array('a'=>1,'b'=>2,'c'=>3)),array('a','b','c''));
		print_r($testArray);*/
		


		//二维数组排序用PHP函数array_multisort解决