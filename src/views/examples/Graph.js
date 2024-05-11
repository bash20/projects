import React from 'react';

import { Doughnut } from 'react-chartjs-2';
import { Card, Container, Row, CardHeader, Col } from 'reactstrap';
//import {Chart, ArcElement, Tooltip, Legend, Title} from 'chart.js';
import Header from 'components/Headers/Header';

  

export default function Graph() {
    const data= {
       labels : ['1 Apr','2 Apr','3 Apr','4 Apr','5 Apr'],
        
        datasets: [{
            label:"User data",
            data:[2,5,10,3,2],
            backgroundColor: ['green',
            'red','lightblue','yellow','pink'],
            borderWidth: 2,
            radius: '40%',
            borderColor: ['green',
            'red','lightblue','yellow','pink']
    }]
    };
    const options = {
       legend:{
        labels:{
            fontColor: 'white'
        }
       },
       title: {
        display: true,
        text: 'Datevise doughnut chart of user registration',
        fontColor: 'white' ,// Font color for title
        fontSize: 15
    }
    }
   
    
  return (
    <>
    <Header/>
        <Container className='mt--7' fluid>
        <Row>
          <Col className="mb-5 mb-xl-0" xl="8">
            <Card className="bg-gradient-default shadow">
              <CardHeader className="bg-transparent">
                <Row className="align-items-center">
                    <Doughnut data={data} options={options}/>
                </Row>
              </CardHeader>
            </Card>
          </Col>
        </Row>
        </Container>
    </>
  )
}
