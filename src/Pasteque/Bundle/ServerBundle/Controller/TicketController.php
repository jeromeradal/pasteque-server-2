<?php
//    POS-Tech API
//
//    Copyright (C) 2012 Scil (http://scil.coop)
//
//    This file is part of POS-Tech.
//
//    POS-Tech is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    POS-Tech is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with POS-Tech.  If not, see <http://www.gnu.org/licenses/>.

namespace Pasteque\Bundle\ServerBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class TicketController extends AbstractController
{
    /**case 'getShared':
  return isset($this->params['id']);
  case 'getAllShared':
  return true;
  case 'delShared':
  return isset($this->params['id']);
  case 'share':
  return isset($this->params['ticket']);
  case 'save':
  return (isset($this->params['ticket'])
  || isset($this->params['tickets']))
  && isset($this->params['cashId']);
  case 'getOpen':
  return true;
  case 'search':
  return ($this->isParamSet("ticketId")
  || $this->isParamSet("ticketType")
  || $this->isParamSet("cashId")
  || $this->isParamSet("dateStart")
  || $this->isParamSet("dateStop")
  || $this->isParamSet("customerId")
  || $this->isParamSet("userId")
  || $this->isParamSet("limit"));
  case 'delete':
  return $this->isParamSet("id");
  }**/

  public function getShared($id)
  { /*
    $repo = $this->getDoctrine()->getRepository('PastequeServerBundle:Ticket');
    $tax = $repo->find($id);

    $response = new Response(json_encode($tax));
    $response->headers->set('Content-Type', 'application/json');

    return $response; **/
  }
}