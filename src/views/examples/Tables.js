
import {Card,CardHeader,Media,Table,Container,Row,Form,Col,FormGroup,Input,CardBody} from "reactstrap";
// core components
import Header from "components/Headers/Header.js";
import axios from "axios";
import { useState, useEffect } from "react";
import './Table.css';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import {  Modal, ModalBody } from 'reactstrap';




const Tables = (props) => {

  const [users, setUsers] = useState([]);
  //const[editId,seteditId] = useState(null)
  const [numberOfRows, setNumberOfRows] = useState('');
  const [newUser, setnewUser] = useState(false);
  const [name, setName] = useState('');
const [emailid, setEmailid] = useState('');
//const [submitting, setSubmitting] = useState(false);
const [error, setError] = useState(null);
const [editUser, seteditUser] = useState(false);
const [editForm,seteditForm] = useState(null);
const [modal,setModal] = useState(false);

  const apiClient = axios.create({
    baseURL: "http://localhost:3001/admin/tables", // Example API endpoint
  });
  const fetchData = () => {
    // Fetch data when the component mounts
    apiClient.get("/").then((response) => {
      setUsers(response.data);
      setNumberOfRows(response.data.length)
    });
  };
  
  
  


  const handleClick = (id) => {
    apiClient.delete(`/api/items/${id}`);
    setUsers(
       users.filter((item) => {
          return item.id !== id;
       })
    );
 };

const handleEdit = (id) => {
  const userToEdit = users.find(user => user.id === id)
  if(userToEdit){
    setName(userToEdit.name);
    setEmailid(userToEdit.emailid);
    seteditForm(userToEdit);
    seteditUser(true);
  }
 
  
}

 /*const handleChange = (field, value, id) => {
  setUsers(prevRecord => {
    return prevRecord.map(item => {
        if(item.id===id){
            return{...item , [field] : value}
        }
        return item
    })
    
})
}*/

const handleSave = async (e) => {
  e.preventDefault();
 // const updatedRecord = users.find(item => item.id === id);
  try{
    apiClient.put(`/api/update/${editForm.id}`, { name, emailid })
    //console.log("Updated Raw:", updatedRecord.name , updatedRecord.emailid , id);
    toast.success(`${name} uapdated successfully`);
  } catch (error) {

  }
        
}

const addUser = () => {
  setnewUser(true)
}


const handleSubmit = async (e) => {
  e.preventDefault();
 // setSubmitting(false);

  setError(null);

  if(!name | !emailid){
    toast("Enter username or emailid");
  }
  else{
  try {
    apiClient.post('http://localhost:3001/submitform', { name, emailid });
    console.log("Form submitted successfully");
    toast.success('Data Entered successfully')
    // Optionally, you can reset the form fields here:
    setName('');
    setEmailid('');
  } catch (error) {
    console.error('Error submitting form:', error);
    setError('An error occurred while submitting the form. Please try again later.');
  } 
};
}

const closeForm = () => {
  setnewUser(false);
  seteditUser(false);
  setName(null);
  setEmailid(null);
  setError(null);
}

useEffect(() => {
  fetchData();
  /*const intervalId = setInterval(fetchData, 3000);
    // Cleanup function to clear the interval when component unmounts
    return () => clearInterval(intervalId);*/

  // eslint-disable-next-line react-hooks/exhaustive-deps
}, []);

const toggel = () => {
  setModal(!modal);
 // console.log("toggel press")
}
  return (
    <>
      <Header nrow={numberOfRows}/>
      
      {/* Page content */}
      <Container className="mt--7" fluid>
        {/* Table */}
        <Row>
          <div className="col">
            <Card className="bg-default shadow">
              <CardHeader className="bg-transparent border-0 d-flex justify-content-between align-items-center">
              <h3 className="text-white mb-0">Card tables</h3>
                <button className="text-right btn btn-light " onClick={() => {addUser();toggel()}}>Add New User </button>
              {newUser && 
      <Container className="mt--7" fluid>
      <ToastContainer/>
        <Row>
          <Col className="order-xl-1" xl="8">
            
             
              <CardBody>
              <Modal isOpen={toggel} toggle={toggel} className="modal-dialog-centered">
                <ModalBody>
              <div className="d-flex justify-content-end">
                            <span className="close-btn" type="button" onClick={closeForm}>×</span>
                          </div>
                <Form onSubmit={handleSubmit}>
                  <h6 className="heading-small text-muted mb-4">
                    User information
                  </h6>
                  <div className="pl-lg-4">
                    <Row>
                      <Col lg="6">
                        <FormGroup>
                          <label
                            className="form-control-label"
                            htmlFor="input-username"
                          >
                            Username
                          </label>
                          <Input
                            className="form-control-alternative"
                            placeholder="Username"
                            type="text"
                            value={name}
                            onChange={(e) => setName(e.target.value)}
                          />
                        </FormGroup>
                      </Col>
                      <Col lg="6">
                        <FormGroup>
                          <label
                            className="form-control-label"
                            htmlFor="input-email"
                          >
                            Email address
                          </label>
                          <Input
                            className="form-control-alternative"
                            placeholder="emailid"
                            type="email"
                            value={emailid}
                            onChange={(e) => setEmailid(e.target.value)}
                          />
                        </FormGroup>
                      </Col>
                    </Row>
                  </div>
                  <button type="submit" className="btn btn-primary">
                     Submit
                  </button>
                  <ToastContainer/>
                  {error && <p className="text-danger mt-2">{error}</p>}
                </Form>
                </ModalBody>
               </Modal>
              </CardBody>
             
          
           
          </Col>
        </Row>
      </Container>
      
 }
                
 {editUser && 
 <Container className="mt--2" fluid>
  
      <ToastContainer/>
        
           
              <CardBody>
              <Modal isOpen={toggel} toggle={toggel} className="modal-dialog-centered">
                  <ModalBody>
              <div className="d-flex justify-content-end">
                            <span className="close-btn" type="button" onClick={() => {closeForm();toggel()}}>×</span>
                          </div>
                <Form >
                  <h6 className="heading-small text-muted mb-4">
                    User information
                  </h6>
                  <div className="pl-lg-4">
                    <Row>
                      <Col lg="6">
                        <FormGroup>
                          <label
                            className="form-control-label"
                            htmlFor="input-username"
                          >
                            Username
                          </label>
                          <Input
                            className="form-control-alternative"
                            placeholder="Username"
                            type="text"
                            value={name}
                            onChange={(e) => setName(e.target.value)}
                          />
                        </FormGroup>
                      </Col>
                      <Col lg="6">
                        <FormGroup>
                          <label
                            className="form-control-label"
                            htmlFor="input-email"
                          >
                            Email address
                          </label>
                          <Input
                            className="form-control-alternative"
                            placeholder="jesse@example.com"
                            type="email"
                            value={emailid}
                            onChange={(e) => setEmailid(e.target.value)}
                          />
                        </FormGroup>
                      </Col>
                    </Row>
                  </div>
                  <button type="submit" className="btn btn-primary" onClick={handleSave} >
                     Save
                  </button>
                  <ToastContainer/>
                  {error && <p className="text-danger mt-2">{error}</p>}
                </Form>
                </ModalBody>
                </Modal>
              </CardBody>
            
          
       
      </Container>
    
 }
              </CardHeader>
              <div style={{maxHeight:'300px', overflowY : 'auto'}}>
              <Table className="align-items-center table-dark table-flush" responsive>
                <thead className="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email Id</th>
                    <th scope="col" />
                  </tr>
                </thead>
                <tbody className="text-center">
                  {users.map((user =>(
                  <tr key={user.id}>
                    <th scope="row">
                      <Media className="align-items-center">
                        <Media>
                          <span className="mb-0 text-sm">
                          <td>{user.id}</td>
                          </span>
                        </Media>
                      </Media>
                    </th>
                    <th scope="row">
                      <Media className="align-items-center">
                        <Media>
                          <span className="mb-0 text-sm">
                          <td>{user.name}</td>
                          </span>
                        </Media>
                      </Media>
                    </th>
                    <th scope="row">
                      <Media className="align-items-center">
                        <Media>
                          <span className="mb-0 text-sm">
                          <td>{user.emailid}</td>
                          </span>
                        </Media>
                      </Media>
                    </th>
                    <button className="btn btn-danger mt-3" onClick={() => handleClick(user.id)}>Delet</button>
                    <button className="btn btn-info mt-3" onClick={() => {handleEdit(user.id);toggel()}}>Edit</button>
                  </tr>
                  )))}
                </tbody>
              </Table>
              </div>
            </Card>
          </div>
        </Row>
      </Container>
    </>
  );
};
export default Tables;

