<?php

class APITest extends TestCase
{
    
    public function testMusic()
    {
         $this->get('/api/music')->seeJson();
    }
    
    public function testMusicId()
    {
        $testjson = ['id' => '1', 'name' => '[AIR] 鳥の詩', 'music' => 'http://music-void-fm.s-api.yunvm.com/air/air-1.ogg', 'image' => 'http://ww4.sinaimg.cn/large/a15b4afegw1fbkmh39pxij21jk0yqwkj.jpg'];
        
        $response = $this->call('GET', '/api/music', $testjson);
        
        $this->assertEquals(json_encode($testjson), $response->content());
    }

    public function testCount()
    {
         $this->get('/api/count')
              ->seeJsonEquals([
                'count' => '2',
              ]);
    }
    
    public function testSearch()
    {
        $testjson = [['id' => 1, 'name' => '[AIR] 鳥の詩', 'music' => 'http://music-void-fm.s-api.yunvm.com/air/air-1.ogg', 'image' => 'http://ww4.sinaimg.cn/large/a15b4afegw1fbkmh39pxij21jk0yqwkj.jpg']];
        
        $response = $this->call('GET', '/api/search', ['name' => 'AIR']);
        
        $this->assertEquals(json_encode($testjson), $response->content());
    }

}
