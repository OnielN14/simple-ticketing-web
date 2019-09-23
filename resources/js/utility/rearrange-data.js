/*

inspired by :
https://github.com/OneWayTech/vue2-datatable/blob/master/examples/src/_mockData/index.js

*/

import {orderBy, uniq} from 'lodash';

const purify = o => JSON.parse(JSON.stringify(o))

export default function rearrangeData(query, data){
  query = purify(query)
  
  // extracting parameter from query
  const { limit = 10, offset = 0, sort = '', order = '' } = query
  
  let matchedItem = []
  let isMatched = true
  let filteredRow = []
  let fileteredRowLength = 0

  // ordering function
  if (sort) {
    data = orderBy(data, sort, order)
  }

  // fuzzy searching function
  if (query.keyword) {
    data.forEach((item, index) =>{
      for (let key in item){
        if (!item.hasOwnProperty(key) || !item[key])
          continue;

        if(item[key].toString().toLowerCase().indexOf(query.keyword) !== -1){
          matchedItem.push(item)
        }
      }
    })

    if(!matchedItem){
      isMatched = false
    }
  }
  else{
    filteredRow = data.slice(offset, offset + limit)
    fileteredRowLength = data.length
  }

  if(isMatched && query.keyword){
    let uniqueData = uniq(matchedItem)
    filteredRow = uniqueData.slice(offset, offset + limit)
    fileteredRowLength = uniqueData.length
  }

  // packaging the result
  const result = {
    rows : filteredRow,
    total : fileteredRowLength
  }

  return Promise.resolve(purify(result))
}
