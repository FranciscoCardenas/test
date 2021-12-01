import React , {useState,useEffect} from 'react'
import { List, Avatar } from 'antd';
import logo from './logo.svg';
import './App.css';

function App() {

  const url = 'http://127.0.0.1:80/prueba/backend/';
  const [todos,setTodos] = useState()
  
  const fetchApi = async () => 
  {
    const response = await fetch(url
  );
   const responseJSON = await response.json()
   setTodos(responseJSON.items);
   console.log(responseJSON.items)

  }

  useEffect(()=>{
    fetchApi()
  },[])


  return (
    <List
    itemLayout="horizontal"
    dataSource={todos}
    renderItem={item => (
      <List.Item>
        <List.Item.Meta
             title={<a>{item.department} {item.sale_date} ${item.price}</a>}
          
          description={<a>{item.description} </a>}    />
      </List.Item>
    )}
  />
  );
}

export default App;
