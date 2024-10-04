import './App.css';
import './dist/css/bootstrap.css';
import './swiper.css';
import './main.js';
import {BrowserRouter , Routes, Route} from 'react-router-dom'
import { MyApp } from "./pages/Application";
import {Form} from  './pages/Form';
import {Login} from  './pages/Login';
import { Vendor } from './pages/Vendor.jsx';
import { Command } from './pages/Command.jsx';

function App() {

  return (
    <BrowserRouter>
        <Routes>
          <Route index element={<MyApp />} />
          <Route path="/" element={<MyApp />} />
          <Route path='/create/account/vendor' element={<Form />} />
          <Route path='/login/vendor' element={<Login />} />
          <Route path='/space/vendor' element={<Vendor/>} />
          <Route path='/commande/:id' element={<Command/>} />
        </Routes>
    </BrowserRouter>
  );
}

export default App;